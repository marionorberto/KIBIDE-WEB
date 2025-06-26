<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('layout_configurations', function (Blueprint $table) {
            $table->uuid('id_user_layout_configuration')->primary();
            $table->uuid('unit_id');
            $table->uuid('user_id');
            $table->enum('theme_mode', ['dark', 'white'])->default('white');
            $table->enum('theme_color', ['1', '2', '3', '4', '5', '6', '7', '8', '9'])->nullable();
            $table->enum('layout_width', ['fluid', 'container'])->default('fluid');
            $table->enum('font_family', ['public_sans', 'roboto', 'poppins', 'inter'])->nullable();
            $table->enum('layout_direction', ['rtl', 'ltr'])->default('rtl');

            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('layout_configurations');
    }
};