<?php
namespace App\Services;

use App\Mail\NewMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserService
{
  public function findOneById(string $id)
  {
    try {

      $user = User::where('id_user', $id)->first();

      if ($user) {
        return [
          'username' => $user->username,
          'email' => $user->email,
          'role' => $user->role,
        ];
      }


      return [];

    } catch (\Exception $e) {
      Log::error('Erro ao enviar e-mail de bem-vindo: ' . $e->getMessage());
      return false;
    }
  }
}