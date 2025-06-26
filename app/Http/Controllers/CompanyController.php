<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyUserRequest;
use App\Mail\WelcomeMail;
use App\Models\Company;
use App\Models\Message;
use App\Models\Notification;
use App\Models\ProfileCompany;
use App\Services\EmailService;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        $companyId = Auth::user()->company_id;
        $unitId = Auth::user()->unit_id;

        $unitsCount = Unit::where('company_id', $companyId)->count();
        $usersCount = User::where('unit_id', $unitId, )->where('company_id', $companyId)->count();
        $deskCount = User::where('company_id', $companyId)->where('role', 'desk')->count();

        $units = DB::table('units')
            ->leftJoin('users as manager', 'units.manager_id', '=', 'manager.id_user')
            ->leftJoin('companies', 'units.company_id', '=', 'companies.id_company')
            ->leftJoin('users', 'units.id_unit', '=', 'users.unit_id') // para contar usuários
            ->select(
                'units.id_unit',
                'units.unit_name',
                'units.unit_email',
                'units.unit_phone',
                'units.unit_address',
                'units.active',
                'companies.company_name',
                'manager.username as manager_name',
                DB::raw('COUNT(users.id_user) as users_count'),
            )
            ->where('units.company_id', $companyId)
            ->groupBy(
                'units.id_unit',
                'units.unit_name',
                'units.unit_email',
                'units.unit_phone',
                'units.unit_address',
                'units.active',
                'companies.company_name',
                'manager.username'
            )
            ->get();

        return view('company.dashboard.index', compact('units', 'unitsCount', 'usersCount', 'deskCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyUserRequest $request): RedirectResponse
    {
        try {

            // Criar a empresa
            $company = Company::create([
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_phone' => $request->company_phone,
                'company_nif' => $request->company_nif,
                'company_address' => $request->company_address,
                'active' => true,
            ]);

            // (Opcional) Criar uma unidade vinculada ao admin e à empresa
            $unit = Unit::create([
                'company_id' => $company->id_company,
                'company_name' => 'change_me',
                'active' => true,
            ]);


            // Criar o usuário admin associado à empresa
            $user = User::create([
                'company_id' => $company->id_company,
                'unit_id' => $unit->id_company, // Aqui já associamos o usuário à unidade
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin', // fixo como admin
                'active' => true,
            ]);

            // Upload de imagem se existir
            $photoPath = null;

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file = $request->file('photo');

                // Gera um nome único com hash e extensão original
                $filename = hash('sha256', uniqid('', true)) . '.' . $file->getClientOriginalExtension();

                // Salva o arquivo com o nome hash na pasta 'logos', disco 'public'
                $photoPath = $file->storeAs('logos', $filename, 'public');
            }

            // Criar perfil da empresa
            ProfileCompany::create([
                'company_id' => $company->id_company,
                'site_url' => $request->site_url,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'linkedin_url' => $request->linkedin_url,
                'photo' => $photoPath, // Campo deve existir na tabela
            ]);

            // 4. Atualizar a unidade para setar o manager_id
            $unit->update([
                'manager_id' => $user->id_user,
            ]);


            // Mail::to('marionorberto2018@gmail.com')->send(new WelcomeMail($user->username));

            $this->emailService->welcome($user->email, $user->username);

            return redirect(route('auth.login.show'))->with('success', 'Empresa e usuário criados com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar empresa e usuário: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            // Validate required fields first
            $request->validate([
                'company_name' => 'required|string|max:255',
                'company_email' => 'required|string|email',
                'company_phone' => 'nullable|string|max:20',
                'company_nif' => [
                    'required',
                    'regex:/^\d+$/',
                    'max:30',
                ],
                'company_address' => 'nullable|string|max:255',
            ], [
                'company_name.required' => 'O nome da empresa é obrigatório.',
                'company_email.required' => 'O e-mail da empresa é obrigatório.',

                'company_nif.required' => 'O NIF é obrigatório.',
                'company_nif.regex' => 'O NIF deve conter apenas números.',
                'company_nif.max' => 'O NIF não pode ter mais que 30 dígitos.',
            ]);

            $company = Company::findOrFail($id);

            // Check for duplicate company_name (excluding current unit)
            $alreadyExistACompanyWithThisNameCreated = Company::where('id_company', Auth::user()->company_id)
                ->where('company_name', $request->company_name)
                ->where('id_company', '!=', $id)
                ->first();

            if ($alreadyExistACompanyWithThisNameCreated) {
                return redirect()->back()->with('error', 'Empresa com esse nome já criado, por favor escolha outro nome!');
            }

            // Check for duplicate unit_email (excluding current unit)
            $alreadyExistACompanyWithThisEmailCreated = Company::where('id_company', Auth::user()->company_id)
                ->where('company_email', $request->company_email)
                ->where('id_company', '!=', $id)
                ->first();

            if ($alreadyExistACompanyWithThisEmailCreated) {
                return redirect()->back()->with('error', 'Empresa com esse email já criado, por favor escolha outro nome!');
            }

            // Check for duplicate unit_email (excluding current unit)
            $alreadyExistACompanyWithThisNIFCreated = Company::where('id_company', Auth::user()->company_id)
                ->where('company_nif', $request->company_nif)
                ->where('id_company', '!=', $id)
                ->first();

            if ($alreadyExistACompanyWithThisNIFCreated) {
                return redirect()->back()->with('error', 'Empresa com esse nif já criado, por favor escolha outro nome!');
            }

            // Update unit data - no need for fallback since we validated the fields
            $company->company_name = $request->company_name;
            $company->company_email = $request->company_email;
            $company->save();

            DB::commit();
            return redirect()->back()->with('success', 'Dados da Empresa editados com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao editar dados da empresa: ' . $e->getMessage(), [
                'id_company' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Não foi possível editar dados da empresa agora. Verifique os dados ou tente mais tarde!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
    {
        // por aqui try catch
        $companyData = Company::where('id_company', Auth::user()->company_id)->first();
        $companyUnitCount = Unit::where('company_id', Auth::user()->company_id)->count();
        $companyUserCount = User::where('company_id', Auth::user()->company_id)->count();
        $user = User::where('company_id', Auth::user()->company_id)->first();
        $profileCompanyData = ProfileCompany::where('company_id', Auth::user()->company_id)->first();

        return view('company.dashboard.profile', compact(
            'companyData',
            'companyUnitCount',
            'companyUserCount',
            'user',
            'profileCompanyData'
        ))->with('section', 'profile-4');
    }


    public function listUsers()
    {
        $company_id = Auth::user()->company_id;
        $companyUsers = User::where('company_id', $company_id)->get();
        return view('company.users.list', compact('companyUsers'));
    }


    public function createUsers()
    {
        $company_id = Auth::user()->company_id;
        $units = Unit::where('company_id', $company_id)->where('manager_id', '=', null)->get();

        return view('company.users.create', compact('units'));

    }

    public function listUnits()
    {
        $companyId = Auth::user()->company_id;

        $units = DB::table('units')
            ->leftJoin('users as manager', 'units.manager_id', '=', 'manager.id_user')
            ->leftJoin('companies', 'units.company_id', '=', 'companies.id_company')
            ->leftJoin('users', 'units.id_company', '=', 'users.unit_id') // para contar usuários
            ->select(
                'units.id_company',
                'units.company_name',
                'units.unit_email',
                'units.unit_phone',
                'units.unit_address',
                'units.active',
                'companies.company_name',
                'manager.username as manager_name',
                DB::raw('COUNT(users.id_user) as users_count')
            )
            ->where('units.company_id', $companyId)
            ->groupBy(
                'units.id_company',
                'units.company_name',
                'units.unit_email',
                'units.unit_phone',
                'units.unit_address',
                'units.active',
                'companies.company_name',
                'manager.username'
            )
            ->get();

        return view('company.units.list', compact('units'));
    }


    public function createUnits()
    {
        return view('company.units.create');
    }

    public function createSms()
    {
        $company_id = Auth::user()->company_id;
        $companyUsers = User::where('company_id', $company_id)->get();

        $units = Unit::where('company_id', Auth::user()->company_id)->get();
        return view('company.sms.create', compact('companyUsers', 'units'));
    }
    public function smsInboxCompany()
    {
        $company_id = Auth::user()->company_id;
        $companyUsers = User::where('company_id', $company_id)->get();

        $myMessages = Message::where('receiver_id', Auth::user()->id_user)->get();

        return view('company.sms.inbox', compact('companyUsers', 'myMessages'));
    }

    public function smsSent()
    {


        $messages = Message::with(['unit', 'receiver', 'sender'])
            ->where('sender_id', Auth::user()->id_user)
            ->get();

        return view('company.sms.sent', compact('messages'));
    }

    public function notificationInbox()
    {
        $userNotifications = Notification::where('user_id', Auth::user()->id_user)->get();
        $notificationCounter = Notification::where('user_id', Auth::user()->id_user)->count();

        return view('company.notificatios.inbox', compact('userNotifications', 'notificationCounter'));
    }

    public function notificationHistories()
    {
        return view('company.notificatios.report');
    }

    public function settings()
    {
        return view('company.settings.index');
    }


    public function licence()
    {
        return view('company.licence.index');
    }

    public function smsStore(Request $request)
    {
        dd($request->all());

        //superadmin

        //desks
    }

    public function updatePhoto(string $id, Request $request)
    {
        DB::beginTransaction();
        try {

            if (!$request->hasFile('photo')) {
                return redirect()->back()->with('error', 'Por favor selecione uma foto válida!');
            }

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $file = $request->file('photo');

                // Gera um nome único com hash e extensão original
                $filename = hash('sha256', uniqid('', true)) . '.' . $file->getClientOriginalExtension();

                // Salva o arquivo com o nome hash na pasta 'logos', disco 'public'
                $photoPath = $file->storeAs('logos', $filename, 'public');
            }


            $profileCompany = ProfileCompany::findOrFail($id);

            if (!$profileCompany)
                return redirect()->back()->with('error', 'Não foi possível atualizar a foto da empresa, tente novamente mais tarde!');

            $profileCompany->photo = $photoPath;
            $profileCompany->save();

            DB::commit();

            return redirect()->back()->with('success', 'Foto da Empresa foi atualizada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro tentando atualizar a foto da empresa', [
                'id_company' => $id,
                'data' => $request->all(),
                'error' => $e->getMessage(),
            ]);

            return redirect()->back()->with('error', 'Não foi possível atualizar a foto da empresa, tente novamente mais tarde!');
        }
    }

}
