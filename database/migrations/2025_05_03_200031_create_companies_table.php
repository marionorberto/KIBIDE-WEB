<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id_company')->primary();  // Define a chave primária como UUID
            $table->string('company_name')->unique();
            $table->string('company_address');
            $table->string('company_phone', 20)->nullable();
            $table->string('company_email')->unique();
            $table->string('company_nif')->unique();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverter a migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};