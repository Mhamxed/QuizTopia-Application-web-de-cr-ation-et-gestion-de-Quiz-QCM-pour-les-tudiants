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
        Schema::create('quiz', function (Blueprint $table) {
            $table->id('id_quiz');                 // Primary key
            $table->string('titre');
            $table->integer('duree');              // Duration in minutes?
            $table->string('module');              // module_
            $table->string('groupe_cible');        // groupe_cible

            // Foreign key to UTILISATEUR
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('utilisateur')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz');
    }
};
