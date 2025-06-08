<?php

namespace App\Http\Controllers;

use App\Events\QueueDisplayTicketsEvent;
use App\Models\OperationAssociation;
use App\Models\Operations;
use App\Models\ProfileCompany;
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
        $unitData = Unit::with('company')
            ->where('id_unit', Auth::user()->unit_id)->first();

        $companyProfileData = ProfileCompany::where('company_id', $unitData->company_id)->first();

        return view('unit.dashboard.display.display', compact('unitData', 'companyProfileData'));
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
