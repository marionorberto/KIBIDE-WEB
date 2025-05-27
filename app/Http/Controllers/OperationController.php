<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Models\DayOperation;
use App\Models\OperationAssociation;
use App\Models\Operations;
use App\Models\Scale;
use App\Models\ScaleUser;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OperationController extends Controller
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
        try {
            Carbon::setLocale('pt_BR');
            $mesAtual = Carbon::now()->translatedFormat('F');

            $dados = json_decode($request->input('linhas_servicos'), true);

            foreach ($dados as $item) {
                $lineId = $item['line']['id'];
                $serviceId = $item['service']['id'];
                $name = $item['name'];
                $realizationTime = $item['realization_date'];

                $OperactionsAlreadyExistis = Operations::where('realization_date', $realizationTime)->exists();

                if ($OperactionsAlreadyExistis) {
                    return redirect()->back()->with("danger", 'Operação do dia já criada!');
                }

                Operations::create([
                    'counter_id' => $lineId,
                    'service_id' => $serviceId,
                    'unit_id' => Auth::user()->unit_id,
                    'realization_date' => $realizationTime,
                    'name' => 'op-' . $mesAtual . str_replace('-', '', $realizationTime),
                    'active' => true,
                ]);
            }

            return redirect()->back()->with("success", 'Lista operações cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }


    public function associateOperation(Request $request)
    {
        try {
            Carbon::setLocale('pt_BR');
            $mesAtual = Carbon::now()->translatedFormat('F');

            $dados = json_decode($request->input('linhas_servicos'), true);

            foreach ($dados as $item) {
                $lineId = $item['line']['id'];
                $serviceId = $item['service']['id'];
                $name = $item['name'];
                $realizationTime = $item['realization_date'];

                $OperactionsAlreadyExistis = Operations::where('realization_date', $realizationTime)->exists();

                if ($OperactionsAlreadyExistis) {
                    return redirect()->back()->with("danger", 'Operação do dia já criada!');
                }

                Operations::create([
                    'counter_id' => $lineId,
                    'service_id' => $serviceId,
                    'unit_id' => Auth::user()->unit_id,
                    'realization_date' => $realizationTime,
                    'name' => 'op-' . $mesAtual . str_replace('-', '', $realizationTime),
                    'active' => true,
                ]);
            }

            return redirect()->back()->with("success", 'Lista operações cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }


    public function storeOperationAssociation(Request $request)
    {
        $dados = json_decode($request->input('dataToRequest'), true);

        try {
            $dayOperationId = $dados[0]['operation']['id'] ?? null;

            if ($dayOperationId) {
                $OperactionsAlreadyExistis = OperationAssociation::where('unit_id', Auth::user()->unit_id)->where('day_operation_id', $dayOperationId)->exists();

                if ($OperactionsAlreadyExistis) {
                    return redirect()->back()->with("danger", 'Operação já foi associada a essa data!');
                }
            } else {
                return redirect()->back()->with("error", 'Operação não selecionada!');
            }

            foreach ($dados as $item) {
                $lineId = $item['line']['id'];
                $serviceId = $item['service']['id'];
                $dayOperationId = $item['operation']['id'];



                OperationAssociation::create([
                    'counter_id' => $lineId,
                    'service_id' => $serviceId,
                    'unit_id' => Auth::user()->unit_id,
                    'day_operation_id' => $dayOperationId
                ]);
            }

            return redirect()->back()->with("success", 'operação associada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


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


    public function assignOperation(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'realization_date' => 'required|date',
                'id_day_operation' => 'required|uuid',
            ]);

            $users = json_decode($request->input('users_desk'), true);

            if (!is_array($users)) {
                return redirect()->back()->with("error", 'Usuário Atendente Inválido!');
            }

            // Verificação adicional: já existe uma escala com a mesma realization_date?
            $existing = Scale::where('realization_date', $request->input('realization_date'))->exists();

            if ($existing) {
                return redirect()->back()->with("error", 'Já existe uma escala com esta data de realização!');
            }


            $scale = Scale::create([
                'unit_id' => Auth::user()->unit_id,
                'day_operation_id' => $request->input('id_day_operation'),
                'realization_date' => $request->realization_date
            ]);

            foreach ($users as $userId) {
                ScaleUser::create([
                    'unit_id' => Auth::user()->unit_id,
                    'user_id' => $userId,
                    'scale_id' => $scale->id_scale,
                ]);
            }

            DB::commit();

            return redirect()->back()->with("success", 'Escalas criadas com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function storeDayOperation(Request $request)
    {
        try {
            $unit_id = Auth::user()->unit_id;


            dd($request->all());

            DayOperation::create([
                "unit_id" => $unit_id,
                "name" => $request->name,
                "realization_date" => $request->realization_date,
                "repeat" => $request->repeat,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "active" => $request->active
            ]);
            return redirect()->back()->with("success", 'Lista operações cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function buscarPorData(string $id, Request $request)
    {
        try {

            // $data = $request->query('data');

            $operacoes = DayOperation::whereDate('realization_date', $id)->first();

            return response()->json(['data' => $operacoes, 'status' => 200,]);
        } catch (\Exception $e) {
            Log::error('Erro no tentando verificar usuário: ' . $e->getMessage());
            return response()->json(['data' => [], 'status' => 404,]);

        }
    }

}
