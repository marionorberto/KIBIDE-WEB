<?php

namespace App\Http\Controllers;

use App\Models\DeskCounter;
use App\Models\Ticket;
use App\Models\TicketGenerated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                ->with(['operationAssociation.service'])
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

            $nextPendingTicket->status = 'called';
            $nextPendingTicket->save();

            return response()->json([
                'ticket' => $nextPendingTicket,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
