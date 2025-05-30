<?php

use App\Events\QueueDisplayTicketsEvent;
use App\Events\TestEvent;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\UnitController;
use App\Models\OperationAssociation;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\StoreChangePasswordRequest;
use App\Models\DayOperation;
use App\Models\Operations;
use App\Models\Ticket;
use App\Models\TicketGenerated;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


Route::post('/auth/login', function (Request $request) {
  try {
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['message' => 'Credenciais inválidas'], 401);
    } else if ($user->role !== 'desk') {
      return response()->json(['message' => 'Usuário Inválido'], 401);
    }

    $token = $user->createToken('token-app')->plainTextToken;

    $user->load('unit');
    // $unit = Unit::where('id_unit', $user->unit_id);

    return response()->json([
      'token' => $token,
      'unit' => $user->unit,
      'userDesk' => $user->id_user,
    ]);

  } catch (\Exception $e) {
    Log::error('Erro no login: ' . $e->getMessage());

    return response()->json([
      'message' => 'Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.' . $e->getMessage()
    ], 500);
  }
})->name('login');

// Route::middleware('auth:sanctum')->get('/listService', function () {
//   try {
//     $operations = Operations::query()
//       ->with(['service', 'counter'])
//       ->where('unit_id', '0196cee1-44ff-714a-8bfc-51c4eaa3799b')
//       ->whereDate('realization_date', '2025-05-20')
//       ->get();

//     return response()->json([
//       'message' => 'fetch com sucesso.',
//       'data' => $operations,
//     ], 200);

//   } catch (\Exception $e) {
//     Log::error('Erro no registan serviço: ' . $e->getMessage());

//     return response()->json([
//       'message' => 'Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.'
//     ], 500);
//   }
// });

Route::middleware('auth:sanctum')->get('/listService/{unit_id}', function (string $unit_id) {
  try {
    $operations = OperationAssociation::query()
      ->with(['service', 'counter', 'dayOperation']) // carrega os relacionados
      ->where('unit_id', $unit_id)
      ->whereHas('dayOperation', function ($query) {
        $query->whereDate('realization_date', Carbon::today());
      })
      ->get();

    return response()->json([
      'message' => 'fetch com sucesso.',
      'data' => $operations,
    ], 200);

  } catch (\Exception $e) {
    Log::error('Erro no registan serviço: ' . $e->getMessage());

    return response()->json([
      'message' => $e->getMessage(),
    ], 500);
  }
});

// Route::middleware('auth:sanctum')->post('/generateTicket', function (Request $request) {
//   try {

//     $ticketCounter = Ticket::where('unit_id', $request->unit_id)->whereDate('created_at', Carbon::today())
//       ->where('operation_id', $request->operation_id)->count();

//     $ticket = Ticket::create([
//       'user_id' => $request->userDeskId,
//       'unit_id' => $request->unit_id,
//       'operation_id' => $request->operation_id,
//       'ticket_number' => $ticketCounter + 1,
//       'requested_at' => now(),
//       'called_at' => null,
//       'status' => 'pending',
//     ]);

//     $ticket->load('operation');

//     // $operations = Operations::where('id_operation', $request->id_operation)->with(['service', 'counter'])->first();
//     $operations = Operations::query()
//       ->with(['service', 'counter'])
//       ->where('id_operation', $request->operation_id)
//       ->first();

//     return response()->json([
//       'message' => 'Ticket generated sucessfully!',
//       'data' => [
//         $ticket,
//         $operations
//       ],
//       200
//     ]);

//   } catch (\Exception $e) {
//     Log::error('Erro no tentando criar  ticket: ' . $e->getMessage());

//     return response()->json([
//       'message' => $e->getMessage(),
//     ], 500);
//   }
// });



Route::middleware('auth:sanctum')->post('/generateTicket', function (Request $request) {
  try {

    $ticketCounter = TicketGenerated::where('unit_id', $request->unit_id)->whereDate('created_at', Carbon::today())->where('operation_association_id', $request->operation_id)->count();

    $ticket = TicketGenerated::create([
      'unit_id' => $request->unit_id,
      'operation_association_id' => $request->operation_id,
      'ticket_number' => $ticketCounter + 1,
      'called_at' => now(),
      'status' => 'pending',
    ]);

    $ticket->load('operationAssociation');

    // $operations = Operations::where('id_operation', $request->id_operation)->with(['service', 'counter'])->first();
    $operations = OperationAssociation::query()
      ->with(['service', 'counter'])
      ->where('id_operation_association', $request->operation_id)
      ->first();

    $pendingTickets = TicketGenerated::query()
      ->with(['operationAssociation.service', 'operationAssociation.counter'])
      ->where('unit_id', $request->unit_id)
      ->whereHas('operationAssociation', function ($query) use ($operations) {
        $query->where('counter_id', $operations->counter->id_counter);
      })
      ->whereDate('created_at', Carbon::today())
      ->where('status', 'pending')
      ->orderBy('created_at', 'asc')
      ->get();

    // Emissão de evento isolada com log de erro se falhar
    try {
      $pendingTicketsSimplified = $pendingTickets->map(function ($ticket) {
        return [
          'ticket_number' => $ticket->ticket_number,
          'status' => $ticket->status,
          'prefix_code' => $ticket->operationAssociation->service->prefix_code
        ];
      });
      event(new TestEvent($pendingTicketsSimplified));
    } catch (\Throwable $e) {
      Log::error($pendingTickets);
      return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
    }

    $pendingTicketsForDisplay = TicketGenerated::query()
      ->with(['operationAssociation.service']) // carrega o service da operationAssociation
      ->where('unit_id', Auth::user()->unit_id)
      ->whereDate('created_at', Carbon::today())
      ->orderBy('created_at', 'DESC')
      ->where('status', 'pending')
      ->take(10)
      ->get();

    // Emissão de evento isolada com log de erro se falhar
    try {
      $pendingTicketsSimplified = $pendingTicketsForDisplay->map(function ($ticket) {
        return [
          'ticket_number' => $ticket->ticket_number,
          'status' => $ticket->status,
          'prefix_code' => $ticket->operationAssociation->service->prefix_code
        ];
      });
      event(new QueueDisplayTicketsEvent($pendingTicketsSimplified));
    } catch (\Throwable $e) {
      Log::error($e);
      return response()->json(['error' => 'Erro ao emitir o evento QueueDisplayTicketsEvent: ERROR->' . $e->getMessage()], 500);
    }// reindexa os resultados


    return response()->json([
      'message' => 'Ticket generated sucessfully!',
      'data' => [
        $ticket,
        $operations,
      ],
      200
    ]);

  } catch (\Exception $e) {
    Log::error('Erro no tentando criar  ticket: ' . $e->getMessage());

    return response()->json([
      'message' => $e->getMessage(),
    ], 500);
  }
});



Route::middleware('auth:sanctum')->post('/verifyPassword', function (Request $request) {
  try {

    $user = User::where('id_user', $request->id_user);

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['message' => 'Credenciais inválidas'], 401);
    } else if ($user->role !== 'desk') {
      return response()->json(['message' => 'Usuário Inválido'], 401);
    }

    return response()->json([
      'message' => 'Ticket generated sucessfully!',
      'status' => 200
    ]);

  } catch (\Exception $e) {
    Log::error('Erro no tentando verificar usuário: ' . $e->getMessage());

    return response()->json([
      'message' => 'Ocorreu um erro ao tentando  verificar usuário. Tente novamente mais tarde.'
    ], 500);
  }
});

Route::get('auth/logout', function (Request $request) {
  $request->user()->currentAccessToken()->delete();
  return response()->json(['message' => 'Logout feito com sucesso']);
});


Route::get('/operation/{id}', [OperationController::class, 'buscarPorData']);

Route::get('/operations/counter/choose/{id}/{user}', [UnitController::class, 'chooseCounter']);