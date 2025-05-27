<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        try {
            $counter = Counter::create([
                "counter_name" => $request->counter_name,
                "active" => $request->active,
                "unit_id" => Auth::user()->unit_id,
                "status" => 'unoccupied'
            ]);

            return redirect()->back()->with("success", 'Linha de atendimento Cadastrada com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
