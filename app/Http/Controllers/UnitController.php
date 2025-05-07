<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unit.dashboard.index');
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
    public function store(StoreUnitRequest $request)
    {
        try {
            $companyId = Auth::user()->company_id;
            $user = Unit::create([
                'company_id' => $companyId,
                'unit_name' => $request->unit_name,
                'unit_email' => $request->unit_email,
                'unit_address' => $request->unit_address,
                'unit_phone' => $request->unit_phone,
                'active' => false,
            ]);
            return redirect()->back()->with('success', 'Unidade criada com sucesso, Adicione um usuário para essa empresa!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar unidade: ' . $e->getMessage());
        }
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
        return view('unit.dashboard.profile');
    }

    public function createDesks()
    {
        return view('unit.dashboard.desks.create');
    }

    public function listDesks()
    {
        return view('unit.dashboard.desks.list');
    }

    public function createSms()
    {
        return view('unit.dashboard.sms.create');
    }

    public function smsInbox()
    {
        return view('unit.dashboard.sms.inbox');
    }

    public function smsSent()
    {
        return view('unit.dashboard.sms.sent');
    }

    public function notificationInbox()
    {
        return view('unit.dashboard.notifications.inbox');
    }

    public function notificationHistories()
    {
        return view('unit.dashboard.notifications.report');
    }

    public function ticketGenerated()
    {
        return view('unit.dashboard.tickets.generated');
    }

    public function ticketSettings()
    {
        return view('unit.dashboard.tickets.settings');
    }

    public function settingsIndex()
    {
        return view('unit.dashboard.settings.index');
    }

    public function settingsDisplay()
    {
        return view('unit.dashboard.settings.index');
    }
}
