<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CarClassSeeder::class,
            CarBodySeeder::class,
            CarEngineSeeder::class,
        ]);
        $this->call(ArticleSeeder::class);
        $this->call(CarSeeder::class);
    }
}
