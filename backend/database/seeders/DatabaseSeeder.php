<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in order respecting FK dependencies
        $this->call([
            ModuleSeeder::class,
            ProfesseurSeeder::class,
            GroupeSeeder::class,
            EtudiantSeeder::class,
            QuizzesSeeder::class,
            QuestionSeeder::class,
            SessionQuizzesSeeder::class,
            ResultatSeeder::class,
            ChoixSeeder::class,
            StatistiqueSeeder::class,
        ]);
    }
}
