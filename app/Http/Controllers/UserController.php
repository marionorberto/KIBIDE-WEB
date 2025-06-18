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
            // Validate required fields first
            $request->validate([
                'username' => 'required|string|min:3|max:255',
                'email' => 'required|email|max:255',
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O campo :attribute deve ser um texto.',
                'min' => 'O campo :attribute deve ter pelo menos :min caracteres.', // Mensagem genérica para min
                'email' => 'Por favor, insira um e-mail válido.',
                'max' => 'O campo :attribute não pode ter mais que :max caracteres.',
            ]);

            $user = User::findOrFail($id);

            // Check for duplicate username (excluding current user)
            $alreadyExistAServiceWithThisNameCreated = User::where('unit_id', Auth::user()->unit_id)
                ->where('username', $request->username)
                ->where('id_user', '!=', $id)
                ->first();

            if ($alreadyExistAServiceWithThisNameCreated) {
                return redirect()->back()->with('error', 'Usuário com esse nome já criado, por favor escolha outro nome!');
            }

            // Check for duplicate email (excluding current user)
            $alreadyExistAPrefixWithThisNameCreated = User::where('unit_id', Auth::user()->unit_id)
                ->where('email', $request->email)
                ->where('id_user', '!=', $id)
                ->first();

            if ($alreadyExistAPrefixWithThisNameCreated) {
                return redirect()->back()->with('error', 'Já existe um usuário com esse email criado, por favor escolha outro email!');
            }

            // Update user data - no need for fallback since we validated the fields
            $user->username = $request->username;
            $user->email = $request->email;

            $user->save();

            DB::commit();
            return redirect()->back()->with('success', 'Dados do usuário editado com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao editar usuário: ' . $e->getMessage(), [
                'id_user' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Erro ao editar este usuário. Verifique os dados e tente novamente.');
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


    public function desksByUnit(string $unitId)
    {
        DB::beginTransaction();
        try {

            $users = User::where('unit_id', $unitId)
                ->where('role', 'desk')
                ->get();

            DB::commit();

            return response()->json(
                $users,
                200
            );

        } catch (\Exception $e) {
            DB::rollBack();
            Log::Error('error trying getting: desksByUnit() | error -> ' . $e->getMessage());
            return redirect()->json('error trying getting: desksByUnit()', 404);
        }
    }

    public function adminByCompany(string $companyId)
    {
        DB::beginTransaction();
        try {

            $user = User::where('company_id', $companyId)
                ->where('role', 'admin')
                ->first();

            DB::commit();

            return response()->json(
                $user,
                200
            );

        } catch (\Exception $e) {
            DB::rollBack();
            Log::Error('error trying getting: desksByUnit() | error -> ' . $e->getMessage());
            return redirect()->json('error trying getting: desksByUnit()', 404);
        }
    }
}
