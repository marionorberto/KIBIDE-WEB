~<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id_service')->primary();
            $table->uuid('unit_id');
            $table->string('description');
            $table->string('prefix_code');
            $table->enum('priority_level', ['normal', 'urgent'])->default('normal');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};