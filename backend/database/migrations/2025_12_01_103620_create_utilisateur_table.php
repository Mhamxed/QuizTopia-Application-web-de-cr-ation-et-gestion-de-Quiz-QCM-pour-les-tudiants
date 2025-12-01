<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id('id_user');          // Primary key
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('mot_de_passe'); // Password column
    
            // Optional fields depending on what you want:
            $table->string('module')->nullable();
            $table->string('groupe')->nullable();
            // ENUM for role
            $table->enum('role', ['student', 'professor'])->default('student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};
