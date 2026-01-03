<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Etudiant::create([
                'Nom'        => $faker->lastName,
                'Prenom'     => $faker->firstName,
                'Email'      => $faker->unique()->safeEmail,
                'MotDePasse' => Hash::make('password'), // always hash
                'id_Groupe'  => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
