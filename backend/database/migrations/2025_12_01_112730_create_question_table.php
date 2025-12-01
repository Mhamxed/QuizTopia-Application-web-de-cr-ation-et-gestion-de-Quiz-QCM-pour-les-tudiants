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
        Schema::create('question', function (Blueprint $table) {
            $table->id('id_question');     // Primary key
            $table->text('enonce');        // Question text
            $table->string('choix1');      // Choice 1
            $table->string('choix2');      // Choice 2
            $table->string('choix3');      // Choice 3
            $table->string('choix4');      // Choice 4
            $table->string('bonne_reponse'); // Correct answer (e.g., "choix1")

            // Foreign key to QUIZ
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
        Schema::dropIfExists('question');
    }
};
