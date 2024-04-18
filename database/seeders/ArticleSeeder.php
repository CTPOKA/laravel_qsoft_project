<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Article::factory()->create([
                'published_at' => now()->day(1),
            ]);
        }

        Article::factory()->count(12)->create();
    }
}
