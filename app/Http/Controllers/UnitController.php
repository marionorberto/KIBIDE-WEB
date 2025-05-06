<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
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
    public function store(StoreUnitRequest $request)
    {

        try {

            // how get the manageId???
            dd($request->all());

            $companyId = Auth::user()->company_id;

            // Criar o usuário admin associado à empresa
            // $user = User::create([
            //     'company_id' => $request->company_id,
            //     'unit_id' => $request->unit_id, // Aqui já associamos o usuário à unidade
            //     'username' => $request->username,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'role' => $request->role,
            //     'active' => $request->active,
            // ]);

            return redirect()->back()->with('success', 'usuário' . $request->role . 'criado com sucesso!');

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
}
