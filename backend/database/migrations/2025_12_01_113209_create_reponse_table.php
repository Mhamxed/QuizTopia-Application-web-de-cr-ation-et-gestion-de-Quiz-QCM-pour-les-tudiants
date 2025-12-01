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
        Schema::create('reponse', function (Blueprint $table) {
            $table->id('id_reponse');              // Primary key
            $table->string('reponse_choisie');     // User's selected answer
            $table->dateTime('date_reponse');      // Date/time of answer

            // Foreign key → QUESTION
            $table->unsignedBigInteger('id_question');
            $table->foreign('id_question')->references('id_question')->on('question')->onDelete('cascade');

            // Foreign key → UTILISATEUR
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse');
    }
};
