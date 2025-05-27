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
        Schema::table('scales', function (Blueprint $table) {
            // Remove a foreign key primeiro (nome da FK pode variar)
            $table->dropForeign(['user_id']);

            // Agora pode remover a coluna
            $table->dropColumn('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('scales', function (Blueprint $table) {
            $table->uuid('user_id');

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }
};
