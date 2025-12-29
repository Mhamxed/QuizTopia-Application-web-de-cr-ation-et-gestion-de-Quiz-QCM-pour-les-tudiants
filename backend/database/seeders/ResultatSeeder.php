<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Resultat;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Resultat::createResultat(
                $faker->numberBetween(0, 20), 
                $faker->numberBetween(1, 10), 
                $faker->numberBetween(1, 5) 
            );
        }
    }
}
