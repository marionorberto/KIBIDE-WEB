<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperationRequest;
use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(StoreOperationRequest $request)
    {
        try {


            // $dados = json_decode($request->input('linhas_servicos'), true);

            // foreach ($dados as $item) {
            //     $lineId = $item['line']['id'];
            //     $serviceId = $item['service']['id'];


            //     // dd($serviceId);
            //     Exemplo: salvar no banco
            //     Operations::create([
            //         'line_id' => $lineId,
            //         'service_id' => $serviceId,
            //         'unit_id' => Auth::user()->unit_id,
            //         'realization_date' => now(),
            //         'active' => true,
            //     ]);
            // }


            Operations::create([
                "description" => $request->description,
                "name" => $request->name,
                "realization_date" => $request->realization_date,
                "counter_id" => $request->counter_id,
                "service_id" => $request->service_id,
                "unit_id" => Auth::user()->unit_id,
                "active" => true,
            ]);

            return redirect()->back()->with("success", 'operação cadastrada com sucesso!');
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
}
