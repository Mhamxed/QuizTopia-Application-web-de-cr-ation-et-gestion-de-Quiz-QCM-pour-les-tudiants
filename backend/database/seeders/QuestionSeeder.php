<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Question::createQuestion(
                $i + 1,                               // Num_Ordre
                $faker->numberBetween(1, 5),          // Point_Question
                $faker->sentence(6),                  // Enonce_Question
                $faker->numberBetween(1, 5)           // ID_Quiz
            );
        }
    }
}
