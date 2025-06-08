<?php

use App\Events\LoadCounterPendingTicket;
use App\Events\QueueDisplayTicketsEvent;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UnitController;
use App\Models\OperationAssociation;
use Illuminate\Support\Facades\Route;
use App\Models\TicketGenerated;
use App\Models\User;
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


Route::middleware('auth:sanctum')->get('/listService/{unit_id}', function (string $unit_id) {
  try {
    $operations = OperationAssociation::query()
      ->with(['service', 'counter', 'dayOperation']) // carrega os relacionados
      ->where('unit_id', $unit_id)
      ->whereHas('dayOperation', function ($query) {
        $query->whereDate('realization_date', Carbon::today());
      })
      ->whereHas('counter', function ($query) {
        $query->where('status', 'occupied');
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

    try {
      $pendingTicketsSimplified = $pendingTickets->map(function ($ticket) {
        return [
          'ticket_number' => $ticket->ticket_number,
          'status' => $ticket->status,
          'prefix_code' => $ticket->operationAssociation->service->prefix_code
        ];
      });

      event(new LoadCounterPendingTicket($pendingTicketsSimplified, $request->operation_id));

    } catch (\Throwable $e) {
      Log::error($pendingTickets);
      return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
    }

    $pendingTicketsForDisplay = TicketGenerated::query()
      ->with(['operationAssociation.service', 'operationAssociation.counter']) // carrega o service da operationAssociation
      ->where('unit_id', $request->unit_id)
      ->whereDate('created_at', Carbon::today())
      ->orderBy('created_at', 'DESC')
      ->where('status', 'pending')
      ->take(10)
      ->get();

    try {
      $pendingTicketsSimplifiedForDisplay = $pendingTicketsForDisplay->map(function ($ticket) {
        return [
          'ticket_number' => $ticket->ticket_number,
          'status' => $ticket->status,
          'prefix_code' => $ticket->operationAssociation->service->prefix_code,
          'service' => $ticket->operationAssociation->service->description,
          'counter' => $ticket->operationAssociation->counter->counter_name,
        ];
      });

      event(new QueueDisplayTicketsEvent($pendingTicketsSimplifiedForDisplay));
    } catch (\Throwable $e) {
      Log::error($e);
      return response()->json(['error' => 'Erro ao emitir o evento pendingTicketsSimplifiedForDisplay: ERROR->' . $e->getMessage()], 500);
    }

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

Route::get('/operation/{unitId}/{id}', [OperationController::class, 'getOperationByDate']);

Route::get('/operations/counter/choose/{id}/{user}', [UnitController::class, 'chooseCounter']);

Route::get('/user/{userId}/selected-counter', [UnitController::class, 'getSelectedCounter']);

Route::get('/user/{unitId}/{userId}/all-tickets-generated', [TicketController::class, 'getAllTicketsGeneratedByDesk']);
Route::get('/user/{unitId}/{userId}/{date}/all-tickets-generated-by-date', [TicketController::class, 'getAllDeskTicketsByDate']);

Route::get('/loadTicketsInQueue/{unitId}', [TicketController::class, 'loadTicketsInQueue']);