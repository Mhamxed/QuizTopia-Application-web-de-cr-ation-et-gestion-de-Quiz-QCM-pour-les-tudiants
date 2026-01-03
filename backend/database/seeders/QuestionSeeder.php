<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'Num_Ordre'        => 1,
                'Point_Question'   => 2,
                'Enonce_Question'  => 'Que signifie PHP ?',
                'ID_Quiz'          => 1, // Quiz PHP
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'Num_Ordre'        => 2,
                'Point_Question'   => 3,
                'Enonce_Question'  => 'Quelle est la différence entre GET et POST ?',
                'ID_Quiz'          => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'Num_Ordre'        => 1,
                'Point_Question'   => 2,
                'Enonce_Question'  => 'Que fait Artisan dans Laravel ?',
                'ID_Quiz'          => 2, // Quiz Laravel
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'Num_Ordre'        => 1,
                'Point_Question'   => 2,
                'Enonce_Question'  => 'Quelle est la dérivée de x² ?',
                'ID_Quiz'          => 3, // Quiz Math
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
