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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('ID_Question');       
            $table->integer('Num_Ordre');
            $table->integer('Point_Question');
            $table->text('Enonce_Question');

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
        Schema::dropIfExists('questions');
    }
};
