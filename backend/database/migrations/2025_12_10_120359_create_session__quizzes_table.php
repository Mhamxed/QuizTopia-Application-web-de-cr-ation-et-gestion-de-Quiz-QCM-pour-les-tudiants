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
        Schema::create('session_quizzes', function (Blueprint $table) {
            $table->id('ID_Session');           
            $table->date('Date_Passage');       // Quiz date
            $table->float('Score_Obtenu');      // Score obtained
            $table->integer('Duree_Effective'); // Duration in minutes or seconds

            $table->unsignedBigInteger('ID_Etu');  // Foreign key to Etudiant
            $table->unsignedBigInteger('ID_Quiz'); // Foreign key to Quiz

            // Foreign key constraints
            $table->foreign('ID_Etu')->references('ID_Etudiant')->on('etudiants')->onDelete('cascade');

            $table->foreign('ID_Quiz')->references('ID_Quiz')->on('quizzes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session__quizzes');
    }
};
