<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            [
                'Nom_Module' => 'Mathématiques',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nom_Module' => 'Informatique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nom_Module' => 'Physique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nom_Module' => 'Statistiques',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
