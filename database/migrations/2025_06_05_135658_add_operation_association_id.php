<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('desk_counters', function (Blueprint $table) {
            $table->uuid('operation_association_id')->nullable()->after('counter_id');

            $table->foreign('operation_association_id')
                ->references('id_operation_association')
                ->on('operation_associations')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desk_counters', function (Blueprint $table) {
            $table->dropForeign(['operation_association_id']);
            $table->dropColumn('operation_association_id');
        });
    }
};