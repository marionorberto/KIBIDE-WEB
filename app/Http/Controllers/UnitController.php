<?php

namespace App\Http\Controllers;

use App\Events\CounterAssingedEvent;
use App\Events\CounterAssingnedForDisplayEvent;
use App\Events\CounterChoosedEvent;
use App\Http\Requests\StoreUnitRequest;
use App\Models\Company;
use App\Models\Counter;
use App\Models\DayOperation;
use App\Models\DeskCounter;
use App\Models\Message;
use App\Models\OperationAssociation;
use App\Models\Operations;
use App\Models\Service;
use App\Models\TicketGenerated;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $ticketCount = TicketGenerated::where('unit_id', Auth::user()->unit_id)->count();
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
        DB::beginTransaction();
        try {
            DB::commit();

            $companyData = Company::where('id_company', Auth::user()->company_id)->first();
            $unitData = Unit::where('manager_id', Auth::user()->id_user)->first();
            $unitUserCount = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->count();
            $countersCount = Counter::where('unit_id', Auth::user()->unit_id)->count();
            $ticketsCount = TicketGenerated::where('unit_id', Auth::user()->unit_id)->count();

            DB::commit();

            return view('unit.dashboard.profile', compact(
                'companyData',
                'unitData',
                'unitUserCount',
                'countersCount',
                'ticketsCount'
            ));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error' . $e);
            return redirect()->back()->with('error', 'Não foi possível mostrar o perfil da unidade, por favor tente mais tarde!');
        }


    }

    public function createDesks()
    {
        return view('unit.dashboard.desks.create');
    }

    public function listDesks()
    {
        try {
            $desks = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->get();

            $desks->load('unit');

            return view('unit.dashboard.desks.list', compact('desks'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Não foi possível listar os atendentes, Por favor tente mais tarde!');
        }
    }

    public function createSms()
    {
        return view('unit.dashboard.sms.create');
    }

    public function smsInbox()
    {

        $messages = Message::with(['unit', 'receiver', 'sender'])
            ->where('unit_id', Auth::user()->unit_id)
            ->where('receiver_id', Auth::user()->id_user)
            ->get();

        return view('unit.dashboard.sms.inbox', compact('messages'));
    }

    public function smsSent()
    {


        $messages = Message::with(['unit', 'receiver', 'sender'])
            ->where('unit_id', Auth::user()->unit_id)
            ->where('sender_id', Auth::user()->id_user)
            ->get();

        return view('unit.dashboard.sms.sent', compact('messages'));
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
        $unitData = Unit::where('id_unit', Auth::user()->unit_id)->first();

        $tickets = TicketGenerated::query()
            ->with(['operationAssociation.service', 'operationAssociation.counter'])
            ->where('unit_id', Auth::user()->unit_id)
            ->get();
        return view('unit.dashboard.tickets.generated', compact('tickets', 'unitData'));
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

    public function associateOperation()
    {

        $services = Service::where('unit_id', Auth::user()->unit_id)->get();
        $counters = Counter::where('unit_id', Auth::user()->unit_id)->get();

        $operations = DayOperation::where('unit_id', Auth::user()->unit_id)->get();


        return view('unit.dashboard.operations.associate-operation', compact('services', 'counters', 'operations'));
    }



    public function createDayOperation()
    {
        // $services = Service::where('unit_id', Auth::user()->unit_id)->get();
        // $counters = Counter::where('unit_id', Auth::user()->unit_id)->get();

        return view('unit.dashboard.operations.day');
    }

    public function assignOperation(Request $request)
    {
        $operations = DayOperation::where('unit_id', Auth::user()->unit_id)->get();
        $desks = User::where('unit_id', Auth::user()->unit_id)->where('role', 'desk')->get();

        return view('unit.dashboard.scales.assign', compact('desks', 'operations'));
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

    public function chooseCounter(string $idOperation, string $userId)
    {
        try {

            $operation = OperationAssociation::query()
                ->with(['service', 'counter', 'dayOperation'])
                ->where('id_operation_association', $idOperation)
                ->first();

            $counter = Counter::find($operation->counter->id_counter);

            $counter->status = $counter->status == 'unoccupied' ? 'occupied' : 'unoccupied';

            $counter->save();

            $alreadyExistsDeskCounterCreatedForToday =
                DeskCounter::where('unit_id', $operation->unit_id)
                    ->where('user_id', $userId)
                    ->where('counter_id', $counter->id_counter)
                    ->where('operation_association_id', $idOperation)
                    ->whereDate('created_at', Carbon::today())
                    ->exists();

            if (!$alreadyExistsDeskCounterCreatedForToday) {
                DeskCounter::create([
                    'unit_id' => $operation->unit_id,
                    'user_id' => $userId,
                    'counter_id' => $counter->id_counter,
                    'operation_association_id' => $idOperation,
                    'status' => $counter->status,
                ]);
            } else {
                $deskCounterToUpdateStatus = DeskCounter::where('unit_id', $operation->unit_id)
                    ->where('user_id', $userId)
                    ->where('counter_id', $counter->id_counter)
                    ->where('operation_association_id', $idOperation)
                    ->whereDate('created_at', Carbon::today())->first();

                $deskCounter =
                    DeskCounter::find($deskCounterToUpdateStatus->id_desk_counter);

                $counter->refresh(); // Só necessário se outros processos podem ter alterado

                if ($counter->save()) {
                    $deskCounter->status = $counter->status;
                    $deskCounter->save();
                }

            }

            $counterId = $counter->id_counter;

            $pendingTickets = TicketGenerated::query()
                ->with(['operationAssociation.service']) // carrega o service da operationAssociation
                ->whereHas('operationAssociation', function ($query) use ($counterId) {
                    $query->where('counter_id', $counterId);
                })
                ->where('unit_id', $operation->unit_id)
                ->whereDate('created_at', Carbon::today())
                ->where('status', 'pending')
                ->get();

            try {
                event(new CounterChoosedEvent([
                    'counterName' => $operation->counter->counter_name,
                    'serviceDescription' => $operation->service->description
                ], $idOperation));

                event(new CounterAssingedEvent());

            } catch (\Throwable $e) {
                Log::error($e->getMessage());
                return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
            }

            event(new CounterAssingnedForDisplayEvent());

            return response()->json([
                'data' => [
                    'tickets' => $pendingTickets
                ],
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro escolher o balcão: ' . $e->getMessage());
            return response()->json(['data' => [], 'message' => $e->getMessage()]);

        }
    }

    public function getSelectedCounter(string $userId)
    {
        try {
            $deskCounter = DeskCounter::with('counter', 'operationAssociation') // carregue os dados do balcão
                ->where('user_id', $userId)
                ->whereHas('counter', function ($query) {
                    $query->where('status', 'occupied');
                })
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at', 'DESC')
                ->first();

            if ($deskCounter) {
                $pendingTickets = TicketGenerated::query()
                    ->with(['operationAssociation.service', 'operationAssociation.counter']) // carrega o service da operationAssociation
                    ->whereHas('operationAssociation', function ($query) use ($deskCounter) {
                        $query->where('counter_id', $deskCounter->counter_id);
                    })
                    ->where('unit_id', $deskCounter->unit_id)
                    ->whereDate('created_at', Carbon::today())
                    ->where('status', 'pending')
                    ->get();

                try {
                    event(new CounterChoosedEvent([
                        'counterName' => $deskCounter->operationAssociation->counter->counter_name,
                        'serviceDescription' => $deskCounter->operationAssociation->service->description
                    ], $deskCounter->operationAssociation->id_operation_association));

                    event(new CounterAssingedEvent());

                    return response()->json([
                        'data' => [
                            'tickets' => $pendingTickets,
                            'operation' => [
                                'counter_name' => $deskCounter->operationAssociation->counter->counter_name,
                                'service_name' => $deskCounter->operationAssociation->service->description,
                                'id_operation' => $deskCounter->operationAssociation->id_operation_association,
                            ]
                        ],
                        'status' => 200,
                    ]);
                } catch (\Throwable $e) {
                    Log::error('erro ao emitir evento, error -> ' . $e->getMessage(), [$deskCounter]);
                    return response()->json(['error' => 'Erro ao emitir o evento.'], 500);
                }
            }

            return response()->json([null]);

        } catch (\Exception $e) {
            Log::error('Erro: ' . $e->getMessage());
            return response()->json(['data' => [], 'message' => $e->getMessage()]);
        }
    }

    public function releaseCounter(string $userId)
    {
        $deskCounter = DeskCounter::where('user_id', $userId)
            ->whereDate('created_at', Carbon::today())
            ->where('status', 'occupied')
            ->first();

        if ($deskCounter) {
            $deskCounter->status = 'unoccupied';
            $deskCounter->save();

            $counter = Counter::find($deskCounter->counter_id);
            $counter->status = 'unoccupied';
            $counter->save();
        }

        return response()->json(['message' => 'Balcão desocupado.']);
    }

    public function listScales()
    {
        return view('unit.dashboard.scales.list');
    }
}
