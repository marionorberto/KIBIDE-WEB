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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id_ticket')->primary();

            $table->uuid('user_id')->nullable();
            $table->uuid('unit_id');
            $table->uuid('counter_id')->nullable();
            $table->uuid('service_id'); // ou considere usar 'service_id' se houver tabela de serviços

            $table->string('ticket_number');
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('called_at')->nullable();
            $table->enum('status', ['pending', 'called', 'served', 'cancelled'])->default('pending');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('user_id')->references('id_user')->on('users')->nullOnDelete();
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('counter_id')->references('id_counter')->on('counters')->nullOnDelete();
            $table->foreign('service_id')->references('id_service')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
