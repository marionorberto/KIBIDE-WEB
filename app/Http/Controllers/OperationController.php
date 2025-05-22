<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

                // $OperactionsAlreadyExistis = Operations::where('realization_date', $realizationTime)->exists();

                // if ($OperactionsAlreadyExistis) {
                //     return redirect()->back()->with("danger", 'Operação do dia já criada!');
                // }
                // dd($serviceId);
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
        dd($request->all());
    }
}
