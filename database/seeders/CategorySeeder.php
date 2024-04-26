<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Легковые',
                'children' => [
                    ['name' => 'Седаны'],
                    ['name' => 'Хетчбеки'],
                    ['name' => 'Универсалы'],
                    ['name' => 'Купе'],
                    ['name' => 'Родстеры'],
                ]
            ],
            [
                'name' => 'Внедорожники',
                'children' => [
                    ['name' => 'Рамные'],
                    ['name' => 'Пикапы'],
                    ['name' => 'Кроссоверы'],
                ]
            ],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки'],
        ];

        foreach ($this->categiruesSlug($categories) as $category) {
            Category::create($category);
        }
    }

    private function categiruesSlug(array $categories): array
    {
        $sortIndex = 0;
        
        array_walk($categories, function (&$category) use (&$sortIndex) {
            if (isset($category['children'])) {
                $category['children'] = $this->categiruesSlug($category['children']);
            }

            $category['slug'] = Str::slug($category['name']);

            $category['sort'] = $sortIndex++;
        });

        return $categories;
    }
}
