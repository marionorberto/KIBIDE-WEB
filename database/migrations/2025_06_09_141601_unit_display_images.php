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
        Schema::create('unit_display_images', function (Blueprint $table) {
            $table->uuid('id_unit_display_image')->primary();
            $table->uuid('unit_id');
            $table->string('image_path');
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
        Schema::dropIfExists('unit_display_images');
    }
};
