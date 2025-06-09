<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
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
        dd($request->all());

        // pôr o campo unit!!



        DB::beginTransaction();

        try {

            Message::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'subject' => $request->subject,
                'content' => $request->content,
                'is_read' => $request->is_read,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();

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
