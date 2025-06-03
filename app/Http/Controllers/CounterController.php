<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CounterController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $alreadyExistAcounterWithThisNameCreated = Counter::where('unit_id', Auth::user()->unit_id)->where('counter_name', $request->counter_name)->first();

            if ($alreadyExistAcounterWithThisNameCreated) {
                return redirect()->back()->with('error', 'Já existe uma linha de atendimento com esse nome criada!');
            }

            $counter = Counter::create([
                "counter_name" => $request->counter_name,
                "active" => $request->active,
                "unit_id" => Auth::user()->unit_id,
                "status" => 'unoccupied'
            ]);
            DB::commit();

            return redirect()->back()->with("success", 'Linha de atendimento Cadastrada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao criar uma nova linha: ' . $e->getMessage(), [
                'request_data' => $request->all()
            ]);
            return redirect()->back()->with("error", 'Erro ao criar uma nova linha de atendimento, tente novamente mais tarde!');
        }
    }

    public function update(string $id, Request $request)
    {
        DB::beginTransaction();

        try {
            $alreadyExistAcounterWithThisNameCreated = Counter::where('unit_id', Auth::user()->unit_id)
                ->where('counter_name', $request->counter_name)
                ->where('id_counter', '!=', $id)
                ->first();

            if ($alreadyExistAcounterWithThisNameCreated) {
                return redirect()->back()->with('error', 'Já existe uma linha de atendimento com esse nome criada, por favor escolha outro nome!');
            }

            $counter = Counter::findOrFail($id); // Usa o ID da rota, não do request

            $counter->counter_name = $request->input('counter_name', $counter->counter_name);
            $counter->status = $request->input('status', $counter->status);

            $counter->save();

            DB::commit();
            return redirect()->back()->with('success', 'Linha editada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erro ao editar linha: ' . $e->getMessage(), [
                'counter_id' => $id,
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Erro ao editar este serviço. Verifique os dados e tente novamente.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
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
            $counter = Counter::findOrFail($id);
            $counter->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Linha excluída com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erro ao deletar Linha: ' . $e->getMessage(), [
                'counter_id' => $id,
                'user_id' => Auth::id(),
                'request_data' => $request->except('password') // Evita logar a senha
            ]);

            return redirect()->back()->with('error', 'Erro ao excluir o serviço. Tente novamente mais tarde.');
        }
    }

}
