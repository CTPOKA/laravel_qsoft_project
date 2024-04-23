<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    public function run(): void
    {
        $bodies = [
            'Седан',
            'Хетчбек',
            'Универсал',
            'Kyne',
            'Родстер',
            'Внедорожник',
            'Рамный',
            'Пикап',
            'Кроссовер',
        ];

        foreach ($bodies as $body) {
            CarBody::factory()->create(['name' => $body]);
        }
    }
}
