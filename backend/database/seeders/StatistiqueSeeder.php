<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statistiques')->insert([
            [
                'Score_Moyen'   => 14.25,
                'Taux_Reussite' => 0.75, // 75%
                'Date_Calcul'   => now()->toDateString(),
                'ID_Quiz'       => 1, // Quiz PHP
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'Score_Moyen'   => 13.00,
                'Taux_Reussite' => 0.65,
                'Date_Calcul'   => now()->toDateString(),
                'ID_Quiz'       => 2, // Quiz Laravel
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'Score_Moyen'   => 16.80,
                'Taux_Reussite' => 0.85,
                'Date_Calcul'   => now()->toDateString(),
                'ID_Quiz'       => 3, // Quiz Math
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
