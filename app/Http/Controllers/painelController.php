<?php

namespace App\Http\Controllers;

use App\Models\DeskCounter;
use Illuminate\Http\Request;

class painelController extends Controller
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

    // public function updateCounterForDisplay(string $id)
    // {
    //     try {
    //         $deskCounter = DeskCounter::with('counter', 'operationAssociation') // carregue os dados do balcão
    //             ->where('user_id', $userId)
    //             ->whereHas('counter', function ($query) {
    //                 $query->where('status', 'occupied');
    //             })
    //             ->whereDate('created_at', Carbon::today())
    //             ->orderBy('created_at', 'DESC')
    //             ->first();
    //     } catch(err) {
    //             console.log(err);
    //     }

    // }
}


