<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('profile_companies', function (Blueprint $table) {
            $table->text('about')->nullable()->after('instagram_url');
        });
    }

    public function down(): void
    {
        Schema::table('profile_companies', function (Blueprint $table) {
            $table->dropColumn('about');
        });
    }
};