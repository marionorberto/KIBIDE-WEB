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
        Schema::table('tickets', function (Blueprint $table) {
            // Remove foreign keys se existirem
            if (Schema::hasColumn('tickets', 'service_id')) {
                $table->dropForeign(['service_id']);
                $table->dropColumn('service_id');
            }

            if (Schema::hasColumn('tickets', 'counter_id')) {
                $table->dropForeign(['counter_id']);
                $table->dropColumn('counter_id');
            }

            // Adiciona operation_id
            $table->uuid('operation_id')->after('id_ticket');
            $table->foreign('operation_id')->references('id_operation')->on('operations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Remove operation_id
            $table->dropForeign(['operation_id']);
            $table->dropColumn('operation_id');

            // Recria os campos removidos
            $table->uuid('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');

            $table->uuid('counter_id')->nullable();
            $table->foreign('counter_id')->references('id')->on('counters');
        });
    }
};
