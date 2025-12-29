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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id('ID_Quiz');               
            $table->string('Titre_Quiz');
            $table->integer('Duree_Minutes');
            $table->date('Date_Creation');

            $table->unsignedBigInteger('ID_Module');   
            $table->unsignedBigInteger('ID_Prof');     

            // Foreign key constraints
            $table->foreign('ID_Module')->references('ID_Module')->on('modules')->onDelete('cascade');

            $table->foreign('ID_Prof')->references('ID_Prof')->on('professeurs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
