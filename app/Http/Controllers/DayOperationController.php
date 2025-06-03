<?php

namespace App\Http\Controllers;

use App\Models\DayOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DayOperationController extends Controller
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
        DB::beginTransaction();
        try {
            $unit_id = Auth::user()->unit_id;

            $OperactionsAlreadyExistis = DayOperation::where('unit_id', Auth::user()->unit_id)->where('realization_date', $request->realization_date)->exists();

            if ($OperactionsAlreadyExistis) {
                return redirect()->back()->with("danger", 'Operação do dia com essa data já criada!');
            }

            DayOperation::create([
                "unit_id" => $unit_id,
                "name" => $request->name,
                "realization_date" => $request->realization_date,
                "repeat" => $request->repeat,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "active" => $request->active
            ]);
            DB::commit();

            return redirect()->back()->with("success", 'Operação diária cadastrada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {

            $dayOperations = DayOperation::query()
                ->where('unit_id', Auth::user()->unit_id)
                ->get();

            return view('unit.dashboard.operations.list-day-operations', compact('dayOperations'));
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
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
