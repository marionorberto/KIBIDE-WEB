<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Events\TicketCalled;
use App\Models\DeskCounter;
use App\Models\Ticket;
use App\Models\TicketGenerated;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
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
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
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
        // DB::beginTransaction();

        // try {
        //     // Validação básica da senha
        //     $request->validate([
        //         'password' => ['required'],
        //     ]);

        //     $user = Auth::user();

        //     // Verifica se a senha está correta
        //     if (!Hash::check($request->password, $user->password)) {
        //         return redirect()->back()->with('error', 'Senha incorreta. A exclusão foi cancelada.');
        //     }

        //     // Localiza o user e desativá-o
        //     $user = User::findOrFail($id);
        //     $user->active = false;
        //     $user->save();

        //     DB::commit();

        //     return redirect()->back()->with('success', 'Serviço excluído com sucesso.');

        // } catch (\Exception $e) {
        //     DB::rollBack();

        //     Log::error('Erro ao deletar serviço: ' . $e->getMessage(), [
        //         'service_id' => $id,
        //         'user_id' => Auth::id(),
        //         'request_data' => $request->except('password') // Evita logar a senha
        //     ]);

        //     return redirect()->back()->with('error', 'Erro ao excluir o serviço. Tente novamente mais tarde.');
        // }

    }

    // public function callNextTicket()
    // {
    //     try {
    //         $desk = DeskCounter::where('unit_id', Auth::user()->unit_id)
    //             ->where('user_id', Auth::user()->id_user)->where('status', 'occupied')->first();

    //         $nextPendingTicket = TicketGenerated::query()
    //             ->with(['operationAssociation.service']) // carrega o service da operationAssociation
    //             ->whereHas('operationAssociation', function ($query) use ($desk) {
    //                 $query->where('counter_id', $desk->counter_id);
    //             })
    //             ->where('unit_id', $desk->unit_id)
    //             ->whereDate('created_at', Carbon::today())
    //             ->where('status', 'pending')
    //             ->orderBy('created_at') // garante que pegará o mais antigo
    //             ->first();


    //         return view('desk.dashboard', compact('nextPendingTicket'));

    //     } catch (\Exception $e) {
    //         return redirect()->back()->with("error", $e->getMessage());
    //     }

    // }

    public function callNextTicket()
    {
        try {
            $desk = DeskCounter::where('unit_id', Auth::user()->unit_id)
                ->where('user_id', Auth::user()->id_user)
                ->whereDate('created_at', Carbon::today())
                ->where('status', 'occupied')
                ->first();

            if (!$desk) {
                return response()->json(['error' => 'Nenhum balcão ocupado encontrado.'], 404);
            }

            $nextPendingTicket = TicketGenerated::query()
                ->with(['operationAssociation.service', 'operationAssociation.counter'])
                ->where('unit_id', $desk->unit_id)
                ->whereHas('operationAssociation', function ($query) use ($desk) {
                    $query->where('counter_id', $desk->counter_id);
                })
                ->whereDate('created_at', Carbon::today())
                ->where('status', 'pending')
                ->orderBy('created_at', 'asc')
                ->first();

            if (!$nextPendingTicket) {
                return response()->json(['ticket' => null]);
            }

            $pendingTickets = TicketGenerated::query()
                ->with(['operationAssociation.service', 'operationAssociation.counter'])
                ->where('unit_id', $desk->unit_id)
                ->whereHas('operationAssociation', function ($query) use ($desk) {
                    $query->where('counter_id', $desk->counter_id);
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
                Log::error($e->getMessage());
                return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
            }

            $nextPendingTicket->status = 'called';
            $nextPendingTicket->save();

            return response()->json([
                'ticket' => $nextPendingTicket,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro inesperado no método callNextTicket: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno do servidor.'], 500);
        }
    }

    public function histories()
    {
        view('desk.dashboard.tickets-histories');
    }

}

// 938650134

// 975360425 - erica bastos: