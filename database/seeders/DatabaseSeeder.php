<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // NO USADOS
        Activity::factory()->create([
            'name' => 'Actividad 1',
            'description' => 'Esta es la primera actividad',
            'price' => 10.99,
            'places' => 20,
            'init_date' => now(),
            'end_date' => now()->addDays(7),
        ]);

        Activity::factory()->create([
            'name' => 'Actividad 2',
            'description' => 'Esta es la segunda actividad',
            'price' => 9.99,
            'places' => 15,
            'init_date' => now()->addDays(2),
            'end_date' => now()->addDays(9),
        ]);

        Activity::factory()->create([
            'name' => 'Actividad 3',
            'description' => 'Esta es la tercera actividad',
            'price' => 8.99,
            'places' => 10,
            'init_date' => now()->addDays(4),
            'end_date' => now()->addDays(11),
        ]);
    }
}
