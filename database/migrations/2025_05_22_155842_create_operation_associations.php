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
        Schema::create('operation_associations', function (Blueprint $table) {
            $table->uuid('id_operation_association')->primary(); // Chave primária UUID
            $table->uuid('unit_id');           // FK para units
            $table->uuid('day_operation_id');  // FK para day_operations
            $table->uuid('service_id');        // FK para services
            $table->uuid('counter_id');        // FK para counters
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('day_operation_id')->references('id_day_operation')->on('day_operations')->onDelete('cascade');
            $table->foreign('service_id')->references('id_service')->on('services')->onDelete('cascade');
            $table->foreign('counter_id')->references('id_counter')->on('counters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_associations');
    }
};
