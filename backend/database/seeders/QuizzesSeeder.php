<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->insert([
            [
                'Titre_Quiz'     => 'Quiz PHP',
                'Duree_Minutes'  => 30,
                'Date_Creation'  => now()->toDateString(),
                'ID_Module'      => 1, // Informatique
                'ID_Prof'        => 1, // Jean Dupont
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'Titre_Quiz'     => 'Quiz Laravel',
                'Duree_Minutes'  => 45,
                'Date_Creation'  => now()->toDateString(),
                'ID_Module'      => 1, // Informatique
                'ID_Prof'        => 2, // Claire Martin
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'Titre_Quiz'     => 'Quiz Mathématiques',
                'Duree_Minutes'  => 20,
                'Date_Creation'  => now()->toDateString(),
                'ID_Module'      => 2, // Mathématiques
                'ID_Prof'        => 3, // Youssef Benali
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
