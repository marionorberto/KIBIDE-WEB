<?php

namespace App\Http\Controllers;

use App\Events\QueueDisplayTicketsEvent;
use App\Models\OperationAssociation;
use App\Models\Operations;
use App\Models\TicketGenerated;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PainelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pendingTickets = TicketGenerated::query()
            ->with(['operationAssociation.service']) // carrega o service da operationAssociation
            ->where('unit_id', Auth::user()->unit_id)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'DESC')
            ->where('status', 'pending')
            ->get();

        $operations = OperationAssociation::query()
            ->with(['service', 'counter', 'dayOperation']) // Carrega os relacionados
            ->where('unit_id', Auth::user()->unit_id)
            ->whereHas('dayOperation', function ($query) {
                $query->whereDate('realization_date', Carbon::today());
            })
            ->whereHas('counter', function ($query) {
                $query->where('status', 'occupied');
            })
            ->get();

        $counters = OperationAssociation::with(['counter', 'dayOperation'])
            ->where('unit_id', Auth::user()->unit_id)
            ->whereHas('dayOperation', function ($query) {
                $query->whereDate('realization_date', Carbon::today());
            })
            ->whereHas('counter', function ($query) {
                $query->where('status', 'occupied');
            })
            ->get()
            ->pluck('counter')      // extrai os objetos counter
            ->unique('id_counter')          // remove duplicados (baseado no ID do counter)
            ->values();


        $unitData = Unit::where('id_unit', Auth::user()->unit_id)->first();
        return view('unit.dashboard.display.painel', compact('unitData', 'operations', 'counters', 'pendingTickets'));
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
}
