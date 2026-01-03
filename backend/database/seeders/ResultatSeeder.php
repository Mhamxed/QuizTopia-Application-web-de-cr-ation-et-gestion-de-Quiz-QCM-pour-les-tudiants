<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resultats')->insert([
            [
                'Points_Obtenus' => 2,
                'ID_Question'   => 1, // Question 1 (PHP)
                'ID_Session'    => 1, // Session 1
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'Points_Obtenus' => 1,
                'ID_Question'   => 2, // Question 2 (PHP)
                'ID_Session'    => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'Points_Obtenus' => 3,
                'ID_Question'   => 3, // Laravel question
                'ID_Session'    => 2, // Session 2
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'Points_Obtenus' => 2,
                'ID_Question'   => 4, // Math question
                'ID_Session'    => 3, // Session 3
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
