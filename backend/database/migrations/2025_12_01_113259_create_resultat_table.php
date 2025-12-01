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
        Schema::create('resultat', function (Blueprint $table) {
            $table->id('id_resultat');        // Primary key
            $table->integer('score');         // Score obtained
            $table->dateTime('date_passage'); // Date/time of quiz attempt
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultat');
    }
};
