<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        Sport::create([
            'name' => 'Futsal',
            'slug' => 'futsal',
            'icon' => '⚽',
        ]);

        Sport::create([
            'name' => 'Badminton',
            'slug' => 'badminton',
            'icon' => '🏸',
        ]);

        Sport::create([
            'name' => 'Basket',
            'slug' => 'basket',
            'icon' => '🏀',
        ]);

        Sport::create([
            'name' => 'Padel',
            'slug' => 'padel',
            'icon' => '🎾',
        ]);
    }
}