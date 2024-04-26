<?php

namespace Database\Factories;

use App\Contracts\Services\ImagesServiceContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        /** @var ImagesServiceContract $imagesService */
        $imagesService = app(ImagesServiceContract::class);
        
        $image = $this->faker->image(category: 'car') ?: public_path('assets/images/no_image.png');
        
        //$url = $this->faker->imageUrl(category: 'car');
        //$image = file_get_contents($url);
        //Storage::put('tmp.jpeg', $image);
        //$image = storage_path('app/tmp.jpeg');

        return [
            'path' => $imagesService->saveFile($image),
        ];
    }
}
