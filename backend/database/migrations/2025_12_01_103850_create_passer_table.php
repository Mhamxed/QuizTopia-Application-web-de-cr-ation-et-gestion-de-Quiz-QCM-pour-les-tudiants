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
        Schema::create('passer', function (Blueprint $table) {
             // Foreign key to UTILISATEUR
            $table->unsignedBigInteger('id_user');

            // Foreign key to QUIZ
            $table->unsignedBigInteger('id_quiz');

            // Composite primary key (id_user + id_quiz)
            $table->primary(['id_user', 'id_quiz']);

            $table->foreign('id_user')->references('id_user')->on('utilisateur')->onDelete('cascade');

            $table->foreign('id_quiz')->references('id_quiz')->on('quiz')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passer');
    }
};
