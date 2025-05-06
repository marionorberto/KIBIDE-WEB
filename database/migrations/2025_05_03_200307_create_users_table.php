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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id_user')->primary(); // UUID como chave primária
            $table->uuid('company_id')->nullable(); // Chave estrangeira para companies
            $table->uuid('unit_id')->nullable(); // Chave estrangeira para companies
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['superadmin', 'admin', 'manager', 'desk', 'guest']);
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('company_id')
                ->references('id_company')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('unit_id')
                ->references('id_unit')
                ->on('units')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
