<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyUserRequest;
use App\Models\Company;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.dashboard.index');
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


            // Criar o usuário admin associado à empresa
            $user = User::create([
                'company_id' => $company->id_company,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin', // fixo como admin
                'active' => true,
            ]);

            // (Opcional) Criar uma unidade vinculada ao admin e à empresa
            Unit::create([
                'company_id' => $company->id_company,
                'manager_id' => $user->id_user,
                'unit_name' => 'change_me',
                'active' => true,
            ]);

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
        return view('company.dashboard.profile');
    }


    public function listUsers()
    {
        return view('company.users.list');

    }


    public function createUsers()
    {
        return view('company.users.create');

    }


}
