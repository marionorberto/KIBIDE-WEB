<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Models\Company;
use App\Models\Counter;
use App\Models\Operations;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('pt_BR');
        $actualMonth = Carbon::now()->translatedFormat('F'); // Ex: "maio"

        $deskCount = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->count();
        $desks = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->get();

        $serviceCount = Service::where('unit_id', Auth::user()->unit_id)->count();
        $ticketCount = Ticket::where('unit_id', Auth::user()->unit_id)->count();
        $counterCount = Counter::where('unit_id', Auth::user()->unit_id)->count();
        return view('unit.dashboard.index', compact('deskCount', 'serviceCount', 'ticketCount', 'counterCount', 'actualMonth', 'desks'));
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
        dd($id);
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
        // por aqui try catch

        $companyData = Company::where('id_company', Auth::user()->company_id)->first();
        $unitData = Unit::where('manager_id', Auth::user()->id_user)->first();
        $unitUserCount = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->count();

        return view('unit.dashboard.profile', compact(
            'companyData',
            'unitData',
            'unitUserCount'
        ))->with('section', 'profile-4');

    }

    public function createDesks()
    {
        return view('unit.dashboard.desks.create');
    }

    public function listDesks()
    {
        $desks = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->get();
        return view('unit.dashboard.desks.list', compact('desks'));
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

    public function createDepartaments()
    {
        return view('unit.dashboard.departaments.create');
    }

    public function listDepartaments()
    {
        return view('unit.dashboard.departaments.list');
    }

    public function createServices()
    {
        return view('unit.dashboard.services.create');
    }

    public function listServices()
    {
        $services = Service::where('unit_id', Auth::user()->unit_id)->get();
        return view('unit.dashboard.services.list', compact('services'));
    }

    public function createAttendanceLines()
    {
        $services = Service::where('unit_id', Auth::user()->unit_id)->get();
        return view('unit.dashboard.attendance-lines.create', compact('services'));
    }

    public function listAttendanceLines()
    {
        $counters = Counter::where('unit_id', Auth::user()->unit_id)->get();
        return view('unit.dashboard.attendance-lines.list', compact('counters'));
    }

    public function showPainel()
    {
        return view('unit.dashboard.display.painel');
    }

    public function painelSettings()
    {
        return view('unit.dashboard.display.settings');
    }

    public function createOperation()
    {

        $services = Service::where('unit_id', Auth::user()->unit_id)->get();
        $counters = Counter::where('unit_id', Auth::user()->unit_id)->get();

        return view('unit.dashboard.operations.create', compact('services', 'counters'));
    }

    public function assignOperation(Request $request)
    {
        $operations = Operations::where('unit_id', Auth::user()->unit_id)->get();
        $desks = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->get();

        return view('unit.dashboard.operations.assign', compact('desks', 'operations'));
    }

    public function listOperation()
    {

        // $operations = Operations::with(['service', 'counter'])
        //     ->where('unit_id', Auth::user()->unit_id)
        //     ->get();

        $operations = Operations::query()
            ->with(['service', 'counter'])
            ->where('unit_id', Auth::user()->unit_id)
            ->get();
        // $operations = Operations::where('unit_id', Auth::user()->unit_id)->get();

        // dd($operations);

        return view('unit.dashboard.operations.list', compact('operations'));
    }

    public function operationSettings()
    {
        return view('unit.dashboard.operations.settings');
    }



}
