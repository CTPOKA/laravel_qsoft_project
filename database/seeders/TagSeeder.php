<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory()->count(10)->create();

        foreach (Article::get() as $article) {
            $article->tags()->saveMany($tags->random(rand(0, 3)));
        }

        foreach (Car::get() as $car) {
            $car->tags()->saveMany($tags->random(rand(0, 3)));
        }
    }
}
