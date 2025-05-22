<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_called', function (Blueprint $table) {
            Schema::create('tickets_called', function (Blueprint $table) {
                $table->uuid('id_ticket_called')->primary(); // Chave primária UUID
                $table->uuid('unit_id');                     // FK para units
                $table->uuid('user_id');                     // FK para users
                $table->uuid('ticket_id');                   // FK para ticket_generated (assumido como referência ao ticket)
                $table->timestamp('called_at')->nullable();  // Momento da chamada
                $table->timestamps();

                // Chaves estrangeiras
                $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('ticket_id')->references('id_ticket_generated')->on('ticket_generated')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_called');
    }
};

