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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('ID_Etudiant');  
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Email')->unique();
            $table->string('MotDePasse');

            $table->unsignedBigInteger('id_Groupe'); // Foreign key to Groupe

            // Foreign key constraint
            $table->foreign('id_Groupe')->references('ID_Groupe')->on('groupes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
