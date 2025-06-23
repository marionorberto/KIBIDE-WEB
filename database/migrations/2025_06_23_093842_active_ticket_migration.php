<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('active_tickets', function (Blueprint $table) {
            $table->uuid('id_active_ticket')->primary();
            $table->uuid('counter_id');
            $table->uuid('ticket_id');
            $table->uuid('unit_id');
            $table->timestamps();

            $table->foreign('counter_id')->references('id_counter')->on('counters')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id_ticket_generated')->on('ticket_generated')->onDelete('cascade');
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_tickets');
    }
};
