<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorContract;
use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;
use App\Models\Category;

class CatalogDataCollector implements CatalogDataCollectorContract
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
    ) {
    }

    public function collectCatalogData(
        CatalogFilterDTO $filterDTO,
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        ?Category $category = null,
    ): CatalogDataDTO {
        $cars = $this->carsRepository->paginateForCatalog(
            $filterDTO,
            ['id', 'name', 'price', 'old_price', 'image_id'],
            $perPage,
            $page,
            $pageName,
            ['image'],
        );

        return new CatalogDataDTO($filterDTO, $cars, $category);
    }
}