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
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id('ID_Stats');        
            $table->float('Score_Moyen');  // Average score
            $table->float('Taux_Reussite'); // Success rate
            $table->date('Date_Calcul');    // Calculation date

            $table->unsignedBigInteger('ID_Quiz'); // Foreign key to Quiz

            // Foreign key constraint
            $table->foreign('ID_Quiz')->references('ID_Quiz')->on('quizzes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiques');
    }
};
