<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarEngineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => sprintf(
                '%s MPI / %s л.с./ %s',
                number_format((rand(10, 90)) / 10, 1, '.'),
                rand(80, 600),
                $this->faker->randomElement(['Бензин', 'Дизель', 'Газ', 'Электро'])
            ),
        ];
    }
}
