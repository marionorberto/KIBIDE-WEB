<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('scale_users', function (Blueprint $table) {
            $table->uuid('id_scale_user')->primary();
            $table->uuid('unit_id');
            $table->uuid('scale_id');
            $table->uuid('user_id');
            $table->timestamps();

            // FKs
            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('scale_id')->references('id_scale')->on('scales')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scale_users');
    }
};
