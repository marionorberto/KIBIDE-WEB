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
        Schema::create('ticket_generated', function (Blueprint $table) {
            $table->uuid('id_ticket_generated')->primary(); // Chave primária UUID
            $table->uuid('unit_id'); // FK para units
            $table->uuid('operation_association_id'); // FK para operation_associations
            $table->string('ticket_number');
            $table->timestamp('called_at')->nullable();
            $table->string('status')->default('pending'); // Valor padrão caso queira, pode ajustar
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('operation_association_id')->references('id_operation_association')->on('operation_associations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_generate');
    }
};
