<?php

namespace App\Services;

use App\Contracts\Repositories\CarCreationServiceContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CarUpdateServiceContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Models\Car;

class CarsService implements CarCreationServiceContract, CarUpdateServiceContract
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly TagsSyncServiceContract $tagsSync,
    ) {
    }

    public function create(array $fields, array $categories = [], ?array $tags = null): Car
    {
        $car = $this->carsRepository->create($fields);

        if (! empty($categories)) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        if ($tags !== null) {
            $this->tagsSync->sync($car, $tags);
        }

        return $car;
    }

    public function update(int $id, array $fields, ?array $categories = null, ?array $tags = null): Car
    {
        $car = $this->carsRepository->getById($id);

        $this->carsRepository->update($car, $fields);

        if ($categories !== null) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        if ($tags !== null) {
            $this->tagsSync->sync($car, $tags);
        }

        return $car;
    }
}