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
        Schema::create('queue_ticket', function (Blueprint $table) {
            Schema::create('queue_tickets', function (Blueprint $table) {
                $table->uuid('id_ticket_queue')->primary(); // Chave primária UUID
                $table->uuid('unit_id');                    // FK para units
                $table->uuid('ticket_generated_id');        // FK para ticket_generated
                $table->uuid('operation_association_id');   // FK para operation_associations
                $table->string('status')->default('waiting'); // status padrão
                $table->timestamps();

                // Chaves estrangeiras
                $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
                $table->foreign('ticket_generated_id')->references('id_ticket_generated')->on('ticket_generated')->onDelete('cascade');
                $table->foreign('operation_association_id')->references('id_operation_association')->on('operation_associations')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_ticket');
    }
};