<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

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

            // Localiza o notificação e deleta
            $notification = Notification::findOrFail($id);
            $notification->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Notificação excluída com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erro ao deletar notificação: ' . $e->getMessage(), [
                'message_id' => $id,
                'user_id' => Auth::id(),
                'request_data' => $request->except('password') // Evita logar a senha
            ]);

            return redirect()->back()->with('error', 'Não  foi possível excluir a notificação. Tente novamente mais tarde!');
        }
    }
}
