<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Counter;
use App\Models\DayOperation;
use App\Models\OperationAssociation;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
        //     return redirect()->back()->with("error", $e->getMessage());

        // }catch (\Exception $e) {
        //     return redirect()->back()->with("error", $e->getMessage());
        // }
        $username = Auth::user()->username;
        // $unoccupiedCounters = Counter::where('unit_id', Auth::user()->unit_id)->get();

        $dayOperation = DayOperation::where('unit_id', Auth::user()->unit_id)->where('realization_date', Carbon::today())->first();


        $operations = OperationAssociation::query()
            ->with(['service', 'counter', 'dayOperation']) // carrega os relacionados
            ->where('unit_id', Auth::user()->unit_id)
            ->whereHas('dayOperation', function ($query) {
                $query->whereDate('realization_date', Carbon::today());
            })
            ->get();

        $nextPendingTicket = null;
        return view('desk.dashboard.index', compact('username', 'operations', 'nextPendingTicket'));
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
    public function store(StoreUserRequest $request)
    {

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

    public function profile()
    {
        $unitData = Unit::where('id_unit', Auth::user()->unit_id)->first();

        $user = Auth::user();

        return view('desk.dashboard.profile', compact('unitData', 'user'));
    }
}
