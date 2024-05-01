<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract extends FlashCacheRepositoryContract
{
    public function findAll(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function findForCatalog(CatalogFilterDTO $filterDTO, array $fields = ['*']): Collection;

    public function paginateForCatalog(
        CatalogFilterDTO $filterDTO,
        array $fields = ['*'],
        int $page = 1,
        int $perpage = 10,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator;

    public function getById(int $id, array $relations = []): Car;

    public function create(array $fields): Car;

    public function update(Car $car, array $fields): Car;

    public function delete(int $id): void;

    public function syncCategories(Car $car, array $categories = []): Car;

    public function count(): int;
}