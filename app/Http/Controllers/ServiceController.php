<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
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
    public function store(StoreServiceRequest $request)
    {
        try {

            $serviceExists = Service::where('unit_id', Auth::user()->unit_id)->where('description', $request->description)->first();

            if ($serviceExists)
                return redirect()->back()->with("error", 'Serviço com esse nome já cadastrado, por favor escolha outro nome/descrição!');


            $serviceExistsWithThisPrefixCode = Service::where('unit_id', Auth::user()->unit_id)->where('prefix_code', $request->prefix_code)->first();

            if ($serviceExistsWithThisPrefixCode)
                return redirect()->back()->with("error", 'Já existe um serviço com esse prefixo cadastrado!');

            $service = Service::create([
                "description" => $request->description,
                "priority_level" => $request->priority_level,
                'prefix_code' => $request->prefix_code,
                "unit_id" => Auth::user()->unit_id,
            ]);

            return redirect()->back()->with("success", "Serviço cadastrado com sucesso!");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
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
    public function edit(string $id, Request $request)
    {
        DB::beginTransaction();

        try {
            $alreadyExistAServiceWithThisNameCreated = Service::where('unit_id', Auth::user()->unit_id)
                ->where('description', $request->description)
                ->where('id_service', '!=', $id)
                ->first();

            if ($alreadyExistAServiceWithThisNameCreated)
                return redirect()->back()->with('error', 'Já existe um serviço com esse *NOME criado, por favor escolha outro nome!');


            $alreadyExistAPrefixWithThisNameCreated = Service::where('unit_id', Auth::user()->unit_id)
                ->where('prefix_code', $request->prefix_code)
                ->where('id_service', '!=', $id)
                ->first();

            if ($alreadyExistAPrefixWithThisNameCreated)
                return redirect()->back()->with('error', 'Já existe um serviço com esse *PREFIXO criado, por favor escolha outro Prefixo!');


            $service = Service::findOrFail($id); // Usa o ID da rota, não do request

            $service->active = $request->input('status', $service->active);
            $service->prefix_code = $request->input('prefix_code', $service->prefix_code);
            $service->description = $request->input('description', $service->description);
            $service->priority_level = $request->input('priority_level', $service->priority_level);

            $service->save();

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {

        DB::beginTransaction();

        try {
            // Validação básica da senha
            $request->validate([
                'password' => ['required'],
            ]);

            $user = Auth::user();

            // Verifica se a senha está correta
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Senha incorreta. A exclusão foi cancelada.');
            }

            // Localiza o serviço e deleta
            $service = Service::findOrFail($id);
            $service->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Serviço excluído com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erro ao deletar serviço: ' . $e->getMessage(), [
                'service_id' => $id,
                'user_id' => Auth::id(),
                'request_data' => $request->except('password') // Evita logar a senha
            ]);

            return redirect()->back()->with('error', 'Erro ao excluir o serviço. Tente novamente mais tarde.');
        }
    }
}