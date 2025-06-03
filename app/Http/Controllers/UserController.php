<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\ProfileCompany;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $companyId = Auth::user()->company_id;

            // Criar o usuário admin associado à empresa
            $user = User::create([
                'company_id' => $companyId,
                'unit_id' => $request->unit_id, // Aqui já associamos o usuário à unidade
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'manager',
                'active' => $request->active,
            ]);


            $unit = Unit::find($request->unit_id);

            $unit->active = true;
            $unit->active = true;
            $unit->manager_id = $user->id_user;
            $unit->save();

            DB::commit();

            return redirect()->back()->with('success', 'Empresa criada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao criar empresa e usuário, Por favor tente mais tarde! ');
        }
    }

    public function storedesks(StoreUserRequest $request)
    {
        try {

            $companyId = Auth::user()->company_id;

            // Criar o usuário admin associado à empresa
            $user = User::create([
                'company_id' => $companyId,
                'unit_id' => Auth::user()->unit_id, // Aqui já associamos o usuário à unidade
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'desk',
                'active' => true,
            ]);

            return redirect()->back()->with('success', 'usuário' . 'desk' . ' criado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
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
    public function update(string $id, Request $request)
    {
        DB::beginTransaction();

        try {

            dd('mexer aqui');
            // $alreadyExistAServiceWithThisNameCreated = Service::where('unit_id', Auth::user()->unit_id)
            //     ->where('description', $request->description)
            //     ->where('id_service', '!=', $id)
            //     ->first();

            // if ($alreadyExistAServiceWithThisNameCreated)
            //     return redirect()->back()->with('error', 'Já existe um serviço com esse *NOME criado, por favor escolha outro nome!');


            // $alreadyExistAPrefixWithThisNameCreated = Service::where('unit_id', Auth::user()->unit_id)
            //     ->where('prefix_code', $request->prefix_code)
            //     ->where('id_service', '!=', $id)
            //     ->first();

            // if ($alreadyExistAPrefixWithThisNameCreated)
            //     return redirect()->back()->with('error', 'Já existe um serviço com esse *PREFIXO criado, por favor escolha outro Prefixo!');


            // $service = Service::findOrFail($id); // Usa o ID da rota, não do request

            // $service->active = $request->input('status', $service->active);
            // $service->prefix_code = $request->input('prefix_code', $service->prefix_code);
            // $service->description = $request->input('description', $service->description);
            // $service->priority_level = $request->input('priority_level', $service->priority_level);

            // $service->save();

            DB::commit();
            return redirect()->back()->with('success', 'Serviço editado com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao editar serviço: ' . $e->getMessage(), [
                'service_id' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Erro ao editar este serviço. Verifique os dados e tente novamente.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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



            $user = User::find($id);
            $user->photo = $photoPath;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Foto de usuário atualizada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Erro ao atualizar foto de usuário, tente novamente mais tarde!');
        }
    }

}
