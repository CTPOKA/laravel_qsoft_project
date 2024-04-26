<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(ImagesServiceContract $imagesService): void
    {
        foreach ($this->banners() as $banner) {
            if (! empty($banner['image'])) {
                $image = $imagesService->createImage(resource_path($banner['image']));
                $banner['image_id'] = $image->id;
            }
            unset($banner['image']);

            Banner::factory()->create($banner);
        }
    }

    private function banners(): array
    {
        return [
            [
                'title' => 'Купи Астон Мартин, получи секретное Задание',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
                'image' => 'assets/pictures/test_banner_1.jpg',
            ],
            [
                'title' => 'Купи Роллс Ройс, получи Отчество к своему имени',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
                'image' => 'assets/pictures/test_banner_2.jpg',
            ],
            [
                'title' => 'Купи Бентли, получи бейсболку',
                'description' => 'Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире',
                'image' => 'assets/pictures/test_banner_3.jpg',
            ],
        ];
    }
}
