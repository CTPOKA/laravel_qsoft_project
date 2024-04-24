<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function getModel(): Car;

    public function findAll(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function findForCatalog(CatalogFilterDTO $filterDTO, array $fields = ['*']): Collection;

    public function paginateForCatalog(
        CatalogFilterDTO $filterDTO,
        array $fields = ['*'],
        int $page = 1,
        int $perpage = 10,
        string $pageName = 'page',
    ): LengthAwarePaginator;

    public function getById(int $id, array $relations = []): Car;

    public function create(array $fields, array $categories = []): Car;

    public function update(int $id, array $fields, array $categories = []): Car;

    public function delete(int $id): void;
}