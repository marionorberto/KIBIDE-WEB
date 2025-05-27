<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketGenerated;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function destroy(string $id)
    {
        //
    }

    public function callNextTicket()
    {

        try {
            $nextTicket = TicketGenerated::whereDate('ticket_generated.created_at', Carbon::today())
                ->where('ticket_generated.status', 'pending')
                ->join('operation_associations', 'ticket_generated.operation_association_id', '=', 'operation_associations.id_operation_association')
                ->where('operation_associations.counter_id', '0196cee3-87b2-7153-8821-6a5ae38229b2')
                ->orderBy('ticket_generated.ticket_number', 'asc')
                ->select('ticket_generated.*') // para retornar só colunas do ticket
                ->first();

            return view('desk.dashboard', compact('nextTicket'));

        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }

    }
}
