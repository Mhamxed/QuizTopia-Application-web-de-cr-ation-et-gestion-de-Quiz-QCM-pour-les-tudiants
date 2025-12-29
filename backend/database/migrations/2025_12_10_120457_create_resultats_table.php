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
        Schema::create('resultats', function (Blueprint $table) {
            $table->id('ID_Resultat');         
            $table->float('Points_Obtenus');   // Points obtained

            $table->unsignedBigInteger('ID_Question'); // Foreign key to Question
            $table->unsignedBigInteger('ID_Session');  // Foreign key to Session_Quiz

            // Foreign key constraints
            $table->foreign('ID_Question')->references('ID_Question')->on('questions')->onDelete('cascade');

            $table->foreign('ID_Session')->references('ID_Session')->on('session_quizzes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats');
    }
};
