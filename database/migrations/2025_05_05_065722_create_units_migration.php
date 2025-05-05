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
        Schema::create('units', function (Blueprint $table) {
            $table->uuid('id_unit')->primary(); // UUID como chave primária
            $table->uuid('company_id');          // Chave estrangeira para companies
            $table->uuid('manager_id');          // Chave estrangeira para users

            $table->string('unit_name');
            $table->string('unit_email')->nullable();
            $table->string('unit_phone')->nullable();
            $table->string('unit_address')->nullable();

            $table->boolean('active')->default(true);
            $table->timestamps();

            // Foreign keys
            $table->foreign('company_id')
                ->references('id_company')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('manager_id')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade'); // ou 'cascade' se preferir remover tudo junto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
