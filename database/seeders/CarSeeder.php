<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'K5',
                'body' => 'Весеннее половодье точно отражает крестьянский коралловый риф, кроме этого, здесь есть ценнейшие коллекции мексиканских масок, бронзовые и каменные статуи из Индии и Цейлона, бронзовые барельефы и изваяния, созданные мастерами Экваториальной Африки пять-шесть веков назад. Независимое государство выбирает широколиственный лес, и не надо забывать, что время здесь отстает от московского на 2 часа. Центральная площадь последовательно применяет крестьянский попугай, также не надо забывать об островах Итуруп, Кунашир, Шикотан и грядах Хабомаи.',
                'price' => 1577900,
                'old_price' => 2394901,
                'salon' => 'Черный, Натуральная кожа (WK)',
                'kpp' => 'Автомат, 6 AT',
                'year' => '2022',
                'color' => 'Yacht Blue (DU3)',
                'is_new' => true,
            ],
            [
                'name' => 'Seed',
                'price' => 1394900,
                'old_price' => 1394901,
            ],
            [
                'name' => 'Cerato',
                'price' => 1221900,
                'old_price' => 1821900,
            ],
            [
                'name' => 'K900',
                'price' => 4064900,
                'old_price' => null,
            ],
            [
                'name' => 'Mohave',
                'price' => 3549900,
                'old_price' => null,
            ],
            [
                'name' => 'Stinger',
                'price' => 2409900,
                'old_price' => null,
            ],
            [
                'name' => 'Rio X',
                'price' => 969900,
                'old_price' => null,
            ],
            [
                'name' => 'Rio',
                'price' => 849900,
                'old_price' => null,
            ],
            [
                'name' => 'Seltos',
                'price' => 1224900,
                'old_price' => null,
            ],
            [
                'name' => 'Sorento',
                'price' => 2219900,
                'old_price' => null,
            ],
            [
                'name' => 'Soul',
                'price' => 1094900,
                'old_price' => null,
            ],
            [
                'name' => 'Sportage',
                'price' => 1644900,
                'old_price' => null,
            ],
            [
                'name' => 'XSeed',
                'price' => 1714900,
                'old_price' => null,
            ],
            [
                'name' => 'Some Car',
                'price' => 9999999,
                'old_price' => null,
            ],
        ];

        foreach ($cars as $car) {
            Car::factory()->create($car);
        }
    }
}
