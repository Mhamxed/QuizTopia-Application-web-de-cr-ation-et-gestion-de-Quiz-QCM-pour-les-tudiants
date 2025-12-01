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
        Schema::create('statistique', function (Blueprint $table) {
            $table->id('id_statistique');          // Primary key
            $table->float('moyenne_score');        // Average score
            $table->integer('nombre_participants'); // Number of participants
            $table->dateTime('date_calcul');       // Calculation date

            // Foreign key → QUIZ
            $table->unsignedBigInteger('id_quiz');
            $table->foreign('id_quiz')->references('id_quiz')->on('quiz')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistique');
    }
};
