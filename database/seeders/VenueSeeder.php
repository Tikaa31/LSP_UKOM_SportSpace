<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $futsal = Sport::where('slug', 'futsal')->first();

        Venue::create([
            'sport_id' => $futsal->id,
            'name' => 'Victory Futsal',
            'location' => 'Jakarta Selatan',
            'description' => 'Lapangan futsal nyaman dengan fasilitas lengkap.',
            'price_per_hour' => 150000,
            'image' => 'image/lapangan.png',
            'rating' => 4.8,
            'is_active' => true,
        ]);

        Venue::create([
            'sport_id' => $futsal->id,
            'name' => 'Champion Arena',
            'location' => 'Jakarta Barat',
            'description' => 'Lapangan futsal modern untuk bermain bersama teman.',
            'price_per_hour' => 160000,
            'image' => 'image/lapangan.png',
            'rating' => 4.7,
            'is_active' => true,
        ]);

        Venue::create([
            'sport_id' => $futsal->id,
            'name' => 'Arena Sport Center',
            'location' => 'Jakarta Timur',
            'description' => 'Lapangan berkualitas dengan area yang nyaman.',
            'price_per_hour' => 175000,
            'image' => 'image/lapangan.png',
            'rating' => 4.9,
            'is_active' => true,
        ]);
    }
}