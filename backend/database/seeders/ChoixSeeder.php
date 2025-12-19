<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Choix;
use Faker\Factory as Faker;

class ChoixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {
            Choix::createChoix(
                $faker->sentence(4),            // Texte_Choix
                $faker->boolean(),              // Est_Correct
                $faker->numberBetween(1, 20),   // ID_Resultat
                $faker->numberBetween(1, 10)    // ID_Question
            );
        }
    }
}
