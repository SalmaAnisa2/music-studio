<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AaStudio;

class StudioSeeder extends Seeder
{
    public function run(): void
    {
        AaStudio::create([
            'name' => 'Studio A',
            'description' => 'Studio Acoustic',
            'price_per_hour' => 50000
        ]);

        AaStudio::create([
            'name' => 'Studio B',
            'description' => 'Studio Band',
            'price_per_hour' => 75000
        ]);
    }
}
