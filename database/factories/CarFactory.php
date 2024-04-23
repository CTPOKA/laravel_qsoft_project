<?php

namespace Database\Factories;

use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'body' => $this->faker->text(500),
            'price' => $price = rand(500000, 5000000),
            'old_price' => $this->faker->optional()->numberBetween($price * 1.1, $price * 1.4),
            'salon' => implode(' ', $this->faker->words(4)),
            'kpp' => implode(' ', $this->faker->words(3)),
            'year' => $year = rand(2012, 2022),
            'color' => $this->faker->colorName(),
            'is_new' => $year > 2020,

            'car_engine_id' => CarEngine::factory(),
            'car_class_id' => CarEngine::factory(),
            'car_body_id' => CarEngine::factory(),
        ];
    }
}
