<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Execute a migration para criar a tabela companies.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id_company')->primary();  // Define a chave primária como UUID
            $table->string('company_name');
            $table->string('address');
            $table->string('phone', 20)->nullable();
            $table->string('email')->unique();
            $table->string('nif');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
}
