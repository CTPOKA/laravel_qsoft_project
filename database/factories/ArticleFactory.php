<?php

namespace Database\Factories;

use App\Models\Image;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => $this->faker->regexify('[a-zA-Z0-9_-]{8}'),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'body' => $this->faker->text(1000),
            'image_id' => Image::factory(),
            'published_at' => $this->faker->optional()->dateTimeThisMonth()?->add(
                new DateInterval('P' . $this->faker->numberBetween(0, now()->daysInMonth - 1) . 'D')
            ),
        ];
    }
}
