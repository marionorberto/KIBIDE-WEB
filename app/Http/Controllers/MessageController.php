<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Services\EmailService;
use App\Services\NotificationService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public $emailService;
    public $userService;

    public $notificationService;
    public function __construct(EmailService $emailService, NotificationService $notificationService, UserService $userService)
    {
        $this->emailService = $emailService;
        $this->userService = $userService;
        $this->notificationService = $notificationService;
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreMessageRequest $request)
    {

        DB::beginTransaction();

        try {

            Message::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'subject' => $request->subject,
                'content' => $request->content,
                'is_read' => $request->is_read,
                'unit_id' => $request->unit_id,
            ]);

            $receiverUserData = $this->userService->findOneById($request->receiver_id);
            $senderUserData = $this->userService->findOneById($request->sender_id);

            $this->emailService->
                newMessage(
                    $receiverUserData['email'],
                    $receiverUserData['username'],
                    $senderUserData['username'],
                    $request->content,
                );

            $this->notificationService->sendNotification($request->receiver_id, 'Nova mensagem', $receiverUserData['username'] . ', recebeste uma nova mensagem do');

            DB::commit();
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Não foi possível enviar notificação, Por favor tente mais tarde!');
        }
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

            // Localiza o serviço e deleta
            $message = Message::findOrFail($id);
            $message->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Messagem excluída com sucesso.');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erro ao deletar message: ' . $e->getMessage(), [
                'message_id' => $id,
                'user_id' => Auth::id(),
                'request_data' => $request->except('password') // Evita logar a senha
            ]);

            return redirect()->back()->with('error', 'Erro ao excluir o message. Tente novamente mais tarde.');
        }
    }
}
