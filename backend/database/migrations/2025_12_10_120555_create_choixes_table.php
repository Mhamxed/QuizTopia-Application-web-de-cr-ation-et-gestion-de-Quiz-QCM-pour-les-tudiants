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
        Schema::create('choixes', function (Blueprint $table) {
            $table->id('ID_Choix');           
            $table->string('Texte_Choix');
            $table->boolean('Est_Correct');    // True or False

            $table->unsignedBigInteger('ID_Resultat'); // Foreign key to Resultat
            $table->unsignedBigInteger('ID_Question'); // Foreign key to Question

            // Foreign key constraints
            $table->foreign('ID_Resultat')->references('ID_Resultat')->on('resultats')->onDelete('cascade');

            $table->foreign('ID_Question')->references('ID_Question')->on('questions')->onDelete('cascade');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choixes');
    }
};
