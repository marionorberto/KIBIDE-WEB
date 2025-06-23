<?php

namespace App\Http\Controllers;

use App\Events\ActiveTicketEvent;
use App\Events\LoadCounterPendingTicket;
use App\Events\QueueDisplayAttendingTicketsEvent;
use App\Models\ActiveTicket;
use App\Models\DeskCounter;
use App\Models\TicketDesk;
use App\Models\TicketGenerated;
use App\Services\EmitEventService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    protected $emitEventService;
    public function __construct(EmitEventService $emitEventService)
    {
        $this->emitEventService = $emitEventService;
    }
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
        //
    }

    public function callNextTicket(string $unitId, string $userId)
    {
        try {
            $desk = DeskCounter::where('unit_id', $unitId)
                ->where('user_id', $userId)
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

            TicketDesk::create([
                'unit_id' => $unitId,
                'user_id' => $userId,
                'ticket_id' => $nextPendingTicket->id_ticket_generated
            ]);

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

            try {
                $pendingTicketsSimplified = $pendingTickets->map(function ($ticket) {
                    return [
                        'ticket_number' => $ticket->ticket_number,
                        'status' => $ticket->status,
                        'prefix_code' => $ticket->operationAssociation->service->prefix_code
                    ];
                });

                event(new LoadCounterPendingTicket($pendingTicketsSimplified, $nextPendingTicket->operationAssociation->id_operation_association));

            } catch (\Throwable $e) {
                Log::error($pendingTickets);
                return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
            }


            $this->emitEventService->emitQueueDisplayTicketsEvent($unitId);
            // $this->emitEventService->emitLastTicketCalled($desk->counter_id, $nextPendingTicket);

            try {
                $AttendingTicketsEvent = [
                    'ticket_number' => $nextPendingTicket->ticket_number,
                    'status' => $nextPendingTicket->status,
                    'prefix_code' => $nextPendingTicket->operationAssociation->service->prefix_code,
                    'service' => $nextPendingTicket->operationAssociation->service->description,
                    'counter' => $nextPendingTicket->operationAssociation->counter->counter_name,
                ];

                event(new QueueDisplayAttendingTicketsEvent($AttendingTicketsEvent));
            } catch (\Throwable $e) {
                Log::error($e);
                return response()->json(['error' => 'Erro ao emitir o evento QueueDisplayAttendingTicketsEvent: ERROR->' . $e->getMessage()], 500);
            }

            $nextPendingTicket->status = 'called';
            $nextPendingTicket->save();


            try {
                // Substituir se já existe um ticket ativo para o balcão
                ActiveTicket::where('counter_id', $nextPendingTicket->operationAssociation->counter->id_counter)->delete();

                ActiveTicket::create([
                    'unit_id' => $unitId,
                    'counter_id' => $nextPendingTicket->operationAssociation->counter->id_counter,
                    'ticket_id' => $nextPendingTicket->id_ticket_generated,
                ]);

                $allActiveCounterTicket = ActiveTicket::query()
                    ->with(['counter', 'ticket.operationAssociation'])
                    ->where('unit_id', $unitId)
                    ->get();

                event(new ActiveTicketEvent($allActiveCounterTicket, $unitId));


            } catch (\Throwable $e) {
                Log::error($e);
                return response()->json(['error' => 'Erro ao emitir o evento emitActiveTickets: ERROR->' . $e->getMessage()], 500);
            }

            return response()->json([
                'ticket' => $nextPendingTicket,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro inesperado no método callNextTicket: ' . $e->getMessage(), [$nextPendingTicket->id_ticket_generated]);
            return response()->json(['error' => 'Erro interno do servidor.'], 500);
        }
    }

    public function histories()
    {
        return view('desk.dashboard.tickets-histories');
    }

    public function getAllTicketsGeneratedByDesk(string $unitId, string $userId)
    {
        try {
            $allTicketsGeneratedByMe = TicketDesk::query()
                ->with(['unit', 'ticket.operationAssociation.counter', 'ticket.operationAssociation.service', 'user'])
                ->where('unit_id', $unitId)
                ->where('user_id', $userId)
                ->whereDate('created_at', Carbon::today())
                ->get();

            return response()->json([
                'tickets' => $allTicketsGeneratedByMe,
            ]);
        } catch (\Exception $e) {
            Log::error(message: 'unexpected error getting all tickets generated by desk. ERROR - ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno do servidor.'], 500);
        }
    }

    public function getAllDeskTicketsByDate(string $unitId, string $userId, string $date)
    {
        try {
            $allTicketsGeneratedByMe = TicketDesk::query()
                ->with(['unit', 'ticket.operationAssociation.counter', 'ticket.operationAssociation.service', 'user'])
                ->where('unit_id', $unitId)
                ->where('user_id', $userId)
                ->whereDate('created_at', $date)
                ->get();

            return response()->json([
                'tickets' => $allTicketsGeneratedByMe,
            ]);
        } catch (\Exception $e) {
            Log::error(message: 'unexpected error getting all tickets generated by desk on specific time. ERROR - ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno do servidor.'], 500);
        }
    }


    public function loadTicketsInQueue(string $unitId)
    {
        try {

            $pendingTicketsForDisplay = TicketGenerated::query()
                ->with(['operationAssociation.service', 'operationAssociation.counter']) // carrega o service da operationAssociation
                ->where('unit_id', $unitId)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at', 'DESC')
                ->where('status', 'pending')
                ->take(10)
                ->get();

            $pendingTicketsSimplifiedForDisplay = $pendingTicketsForDisplay->map(function ($ticket) {
                return [
                    'ticket_number' => $ticket->ticket_number,
                    'status' => $ticket->status,
                    'prefix_code' => $ticket->operationAssociation->service->prefix_code,
                    'service' => $ticket->operationAssociation->service->description,
                    'counter' => $ticket->operationAssociation->counter->counter_name,
                    'counter_id' => $ticket->operationAssociation->counter->id_counter,
                ];
            });

            return response()->json(
                [
                    'data' => $pendingTicketsSimplifiedForDisplay,
                ],
                200
            );

        } catch (\Exception $e) {
            Log::error(message: 'unexpected error getting all tickets generated by desk on specific time. ERROR - ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno do servidor.'], 500);
        }
    }
}