<?php
namespace App\Services;

use App\Mail\NewMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;

class EmailService
{
  public function welcome(string $to, string $username): bool
  {
    try {
      Mail::to($to)->send(new WelcomeMail($username));
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
      Log::error('Erro ao enviar e-mail de nova mensagem: ' . $e->getMessage(), [
        $to,
        $username,
        $sender,
        $message
      ]);
      return false;
    }
  }
}