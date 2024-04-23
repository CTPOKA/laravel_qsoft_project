<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            'Бюджет',
            'Бизнес-класс',
            'Представительский класс',
            'Люкс',
        ];

        foreach ($classes as $class) {
            CarClass::factory()->create(['name' => $class]);
        }
    }
}
