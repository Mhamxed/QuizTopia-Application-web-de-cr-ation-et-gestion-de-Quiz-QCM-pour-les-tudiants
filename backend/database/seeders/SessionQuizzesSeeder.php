<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SessionQuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('session_quizzes')->insert([
            [
                'Date_Passage'     => now()->subDays(2)->toDateString(),
                'Score_Obtenu'     => 15.5,
                'Duree_Effective' => 28,
                'ID_Etu'           => 1, // Etudiant #1
                'ID_Quiz'          => 1, // Quiz PHP
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'Date_Passage'     => now()->subDays(1)->toDateString(),
                'Score_Obtenu'     => 12,
                'Duree_Effective' => 35,
                'ID_Etu'           => 2, // Etudiant #2
                'ID_Quiz'          => 2, // Quiz Laravel
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'Date_Passage'     => now()->toDateString(),
                'Score_Obtenu'     => 18,
                'Duree_Effective' => 20,
                'ID_Etu'           => 3, // Etudiant #3
                'ID_Quiz'          => 3, // Quiz Math
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
