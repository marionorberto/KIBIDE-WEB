<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->uuid('id_operation')->primary();
            $table->uuid('service_id');
            $table->uuid('counter_id');
            $table->uuid('unit_id');

            $table->string('name')->nullable();
            $table->date('realization_date');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('service_id')->references('id_service')->on('services')->onDelete('cascade');
            $table->foreign('counter_id')->references('id_counter')->on('counters')->onDelete('cascade');

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
