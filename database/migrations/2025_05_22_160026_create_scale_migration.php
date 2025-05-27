<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('scales', function (Blueprint $table) {
            $table->uuid('id_scale')->primary();          // Chave primária UUID
            $table->uuid('unit_id');                      // FK para units
            $table->uuid('user_id');                      // FK para users
            $table->uuid('day_operation_id');             // FK para day_operations
            $table->date('realization_date')->unique();             // FK para day_operations
            $table->date('end_date');             // FK para day_operations
            $table->boolean('repeat')->default(true);             // FK para day_operations

            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('day_operation_id')->references('id_day_operation')->on('day_operations')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('scales');
    }
};

