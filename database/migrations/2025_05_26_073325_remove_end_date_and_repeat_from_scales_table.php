<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('scales', function (Blueprint $table) {
            $table->dropColumn(['end_date', 'repeat']);
        });
    }

    public function down(): void
    {
        Schema::table('scales', function (Blueprint $table) {
            $table->date('end_date')->nullable();
            $table->boolean('repeat')->default(true);
        });
    }
};
