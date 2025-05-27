<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('day_operations', function (Blueprint $table) {
            $table->uuid('id_day_operation')->primary(); // Chave primária UUID
            $table->uuid('unit_id'); // FK para units
            $table->string('name')->unique();
            $table->date('realization_date')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->boolean('repeat')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Definindo chave estrangeira
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_operation');
    }
};
