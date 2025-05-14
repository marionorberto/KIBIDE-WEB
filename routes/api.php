<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\StoreChangePasswordRequest;
use App\Models\Operations;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

// Route::middleware('auth:sanctum')->group(function () {
//   Route::get('/users', [UserController::class, 'index']);
//   Route::post('/companies', [CompanyController::class, 'store']);


//   Route::get('/testing', function () {
//     return response()->json([
//       'message' => 'fetched sucessfully!',
//       'data' => [
//         'username' => 'marionorberto',
//         'email' => 'marionorberto2018@gmail.com',
//       ]
//     ], 200);
//   });

// });


Route::get('/hello', function () {
  return response()->json([
    'message' => 'Olá, esta é uma rota de API funcionando corretamente!',
    'status' => 'success'
  ]);
});

Route::post('/login', function (Request $request) {
  try {
    $credentials = $request->only(['username', 'password']);

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      // $token = $user->createToken('api_token')->plainTextToken; // se estiver usando Sanctum

      return response()->json([
        'message' => 'Login efetuado com sucesso.',
        'user' => $user,
        'token' => 'token??',
        'role' => $user->role,
      ], 200);
    }

    return response()->json([
      'message' => 'Credenciais inválidas.'
    ], 401);

  } catch (\Exception $e) {
    Log::error('Erro no login: ' . $e->getMessage());

    return response()->json([
      'message' => 'Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.'
    ], 500);
  }
})->name('login');



Route::get('/listService', function () {
  try {
    $operations = Operations::query()
      ->with(['service', 'counter'])
      ->where('unit_id', '0196c3d6-a80c-72b1-a524-f2ce1d7b936d')
      ->get();

    return response()->json([
      'message' => 'fetch com sucesso.',
      'data' => $operations,
    ], 200);

  } catch (\Exception $e) {
    Log::error('Erro no registan serviço: ' . $e->getMessage());

    return response()->json([
      'message' => 'Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.'
    ], 500);
  }
});