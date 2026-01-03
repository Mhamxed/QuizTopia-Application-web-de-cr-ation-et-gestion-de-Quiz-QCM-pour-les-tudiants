<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('professeurs')->insert([
            [
                'Nom' => 'Dupont',
                'Prenom' => 'Jean',
                'Email' => 'jean.dupont@school.com',
                'MotDePasse' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nom' => 'Martin',
                'Prenom' => 'Claire',
                'Email' => 'claire.martin@school.com',
                'MotDePasse' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nom' => 'Benali',
                'Prenom' => 'Youssef',
                'Email' => 'youssef.benali@school.com',
                'MotDePasse' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
