<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyUserRequest;
use App\Mail\WelcomeMail;
use App\Models\Company;
use App\Models\Message;
use App\Models\ProfileCompany;
use App\Services\EmailService;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        return view('company.dashboard.index', compact('units', 'unitsCount', 'usersCount'));
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
                'unit_name' => 'change_me',
                'active' => true,
            ]);


            // Criar o usuário admin associado à empresa
            $user = User::create([
                'company_id' => $company->id_company,
                'unit_id' => $unit->id_unit, // Aqui já associamos o usuário à unidade
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
        //
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

        return view('company.dashboard.profile', compact(
            'companyData',
            'companyUnitCount',
            'companyUserCount'
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
                DB::raw('COUNT(users.id_user) as users_count')
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
        return view('company.sms.sent');

    }

    public function notificationInbox()
    {
        $company_id = Auth::user()->company_id;
        $companyUsers = User::where('company_id', $company_id)->get();
        return view('company.notificatios.inbox', compact('companyUsers'));
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


}
