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
        Schema::create('scales', function (Blueprint $table) {
            $table->uuid('id_scale')->primary();          // Chave primária UUID
            $table->uuid('unit_id');                      // FK para units
            $table->uuid('user_id');                      // FK para users
            $table->uuid('day_operation_id');             // FK para day_operations
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('day_operation_id')->references('id_day_operation')->on('day_operations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scale_migration');
    }
};

