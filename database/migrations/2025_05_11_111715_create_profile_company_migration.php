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
        Schema::create('profile_company', function (Blueprint $table) {
            $table->uuid('id_profile_company')->primary();
            $table->uuid('company_id');

            $table->string('sector_industry')->nullable();
            $table->unsignedInteger('number_of_employees')->nullable();
            $table->date('founded_at')->nullable();

            $table->string('website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();

            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('company_id')->references('id_company')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_company');
    }
};
