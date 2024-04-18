<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->regexify('[a-zA-Z0-9_-]{8}'),
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(255),
            'body' => $this->faker->text(1000),
            'published_at' => $this->faker->optional()->dateTimeThisMonth()?->add(
                new DateInterval('P' . $this->faker->numberBetween(0, now()->daysInMonth - 1) . 'D')
            ),
        ];
    }
}
