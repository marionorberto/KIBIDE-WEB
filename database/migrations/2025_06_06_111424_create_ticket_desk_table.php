<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('tickets_desk', function (Blueprint $table) {
            $table->uuid('id_ticket_desk')->primary();
            $table->uuid('unit_id');
            $table->uuid('user_id');
            $table->uuid('ticket_id');

            $table->timestamps();

            $table->foreign('unit_id')->references('id_unit')->on('units')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id_ticket_generated')->on('ticket_generated')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets_desk');
    }
};
