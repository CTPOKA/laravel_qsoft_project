<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    public function run(): void
    {
        CarEngine::factory()->count(10)->create();
    }
}
