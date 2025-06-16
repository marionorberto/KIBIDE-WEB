<?php
namespace App\Services;

use App\Mail\NewMessage;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
  public function welcome(string $to, string $username): bool
  {
    try {
      return true;
    } catch (\Exception $e) {
      Log::error('Erro ao enviar e-mail de bem-vindo: ' . $e->getMessage());
      return false;
    }
  }

  public function newMessage(string $to, string $username, string $sender, string $message): bool
  {
    try {
      Mail::to($to)->send(new NewMessage($username, $sender, $message));
      return true;
    } catch (\Exception $e) {
      Log::error('Erro ao enviar e-mail de bem-vindo: ' . $e->getMessage());
      return false;
    }
  }

  public function sendNotification(string $to, string $title, string $description, $link = null): void
  {
    DB::beginTransaction();
    try {

      Notification::create([
        'user_id' => $to,
        'title' => $title,
        'description' => $description,
        'link' => $link,
      ]);

      DB::commit();

    } catch (\Exception $err) {
      DB::rollBack();

      Log::error('error tentando enviar notificação:  ' . $err->getMessage());
    }

  }
}