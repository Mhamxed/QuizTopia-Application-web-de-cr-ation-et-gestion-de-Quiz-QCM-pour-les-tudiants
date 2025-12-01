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
        Schema::create('generer', function (Blueprint $table) {
            // Foreign key → QUIZ
            $table->unsignedBigInteger('id_quiz');

            // Foreign key → RESULTAT
            $table->unsignedBigInteger('id_resultat');

            // Composite primary key to prevent duplicates
            $table->primary(['id_quiz', 'id_resultat']);

            // FK constraints
            $table->foreign('id_quiz')
                ->references('id_quiz')
                ->on('quiz')
                ->onDelete('cascade');

            $table->foreign('id_resultat')
                ->references('id_resultat')
                ->on('resultat')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generer');
    }
};
