<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
    public function store(StoreServiceRequest $request)
    {
        try {

            $serviceExists = Service::where('unit_id', Auth::user()->unit_id)->where('description', $request->description)->first();

            if ($serviceExists)
                return redirect()->back()->with("error", 'Serviço já cadastrado!');

            $service = Service::create([
                "description" => $request->description,
                "priority_level" => $request->priority_level,
                'Prefix_code' => $request->Prefix_code,
                "unit_id" => Auth::user()->unit_id,
            ]);

            return redirect()->back()->with("success", "Serviço cadastrado com sucesso!");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
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
}
