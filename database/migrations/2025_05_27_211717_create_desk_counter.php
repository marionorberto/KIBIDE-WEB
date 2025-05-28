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
        Schema::create('desk_counters', function (Blueprint $table) {
            $table->uuid('id_desk_counter')->primary();
            $table->uuid('unit_id');
            $table->uuid('user_id');
            $table->uuid('counter_id');
            $table->enum('status', ['occupied', 'unoccupied'])->default('unoccupied');

            $table->timestamps();

            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('counter_id')->references('id_counter')->on('counters')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desk_counters');
    }
};