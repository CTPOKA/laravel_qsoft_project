<?php

namespace App\Services;

use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarRemoveServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Models\Car;

class CarsService implements CarCreationServiceContract, CarUpdateServiceContract, CarRemoveServiceContract
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly TagsSyncServiceContract $tagsSync,
        private readonly ImagesServiceContract $imagesService,
    ) {
    }

    public function create(array $fields, array $categories = [], ?array $tags = null): Car
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $car = $this->carsRepository->create($fields);

        if (! empty($categories)) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        if ($tags !== null) {
            $this->tagsSync->sync($car, $tags);
        }

        $this->carsRepository->flashCache();

        return $car;
    }

    public function update(int $id, array $fields, ?array $categories = null, ?array $tags = null): Car
    {
        $car = $this->carsRepository->getById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $car->image_id;
        }

        $this->carsRepository->update($car, $fields);

        if ($categories !== null) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        if ($tags !== null) {
            $this->tagsSync->sync($car, $tags);
        }

        if ($oldImageId !== null) {
            $this->imagesService->deleteImage($oldImageId);
        }

        $this->carsRepository->flashCache();

        return $car;
    }

    public function delete(int $id)
    {
        $car = $this->carsRepository->getById($id);

        if (! empty($car->image_id)) {
            $this->imagesService->deleteImage($car->image_id);
        }

        $this->carsRepository->delete($id);

        $this->carsRepository->flashCache();
    }
}