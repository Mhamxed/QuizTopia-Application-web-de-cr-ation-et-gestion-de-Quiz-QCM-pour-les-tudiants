<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Choix;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ChoixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choixes')->insert([
            [
                'Texte_Choix'  => 'PHP: Hypertext Preprocessor',
                'Est_Correct'  => true,
                'ID_Resultat'  => 1, // Resultat Q1
                'ID_Question'  => 1, // Question PHP
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => 'Personal Home Page',
                'Est_Correct'  => false,
                'ID_Resultat'  => 1,
                'ID_Question'  => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => 'GET sends data in URL',
                'Est_Correct'  => true,
                'ID_Resultat'  => 2,
                'ID_Question'  => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => 'POST sends data in headers',
                'Est_Correct'  => true,
                'ID_Resultat'  => 2,
                'ID_Question'  => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => 'Artisan is a CLI tool',
                'Est_Correct'  => true,
                'ID_Resultat'  => 3,
                'ID_Question'  => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => 'Artisan is a database',
                'Est_Correct'  => false,
                'ID_Resultat'  => 3,
                'ID_Question'  => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Texte_Choix'  => '2x',
                'Est_Correct'  => true,
                'ID_Resultat'  => 4,
                'ID_Question'  => 4,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
