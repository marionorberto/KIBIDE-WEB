<?php
namespace App\Services;

use App\Events\ActiveTicketEvent;
use App\Events\LastTicketCalledEvent;
use App\Events\QueueDisplayAttendingTicketsEvent;
use App\Events\QueueDisplayTicketsEvent;
use App\Models\TicketGenerated;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class EmitEventService
{
  public function emitQueueDisplayTicketsEvent(string $unitId)
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


    } catch (\Exception $e) {
      Log::error('Erro ao enviar e-mail de bem-vindo: ' . $e->getMessage());
      return false;
    }
  }


  public function emitLastTicketCalled($counterId, $ticketData)
  {
    try {
      event(new LastTicketCalledEvent($counterId, $ticketData));
    } catch (\Throwable $e) {
      Log::error($e);
      return response()->json(['error' => 'Erro ao emitir o evento pendingTicketsSimplifiedForDisplay: ERROR->' . $e->getMessage()], 500);
    }
  }

}
