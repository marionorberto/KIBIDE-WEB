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
        Schema::create('counter_service', function (Blueprint $table) {
            $table->uuid('counter_id');
            $table->uuid('service_id');

            $table->foreign('counter_id')->references('id_counter')->on('counters')->onDelete('cascade');
            $table->foreign('service_id')->references('id_service')->on('services')->onDelete('cascade');

            $table->primary(['counter_id', 'service_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_service');
    }
};
