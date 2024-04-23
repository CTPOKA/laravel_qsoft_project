<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(private readonly Car $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForMainPage(int $limit): Collection
    {
        return $this->getModel()
            ->where('is_new', true)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    public function findForCatalog(CatalogFilterDTO $filterDTO, array $fields = ['*']): Collection
    {
            return $this->catalogQuery($filterDTO)->get($fields);
    }

    public function paginateForCatalog(
        CatalogFilterDTO $filterDTO,
        array $fields = ['*'],
        int $perpage = 8,
        int $page = 1,
        string $pageName = 'page',
    ): LengthAwarePaginator
    {
        return $this->catalogQuery($filterDTO)->paginate($perpage, $fields, $pageName, $page);
    }

    private function catalogQuery(CatalogFilterDTO $dto): Builder
    {
        return $this->getModel()
            ->when($dto->getModel() !== null, fn ($query) => $query->where('name', 'like', "%{$dto->getModel()}%"))
            ->when($dto->getMinPrice() !== null, fn ($query) => $query->where('price', '>=', $dto->getMinPrice()))
            ->when($dto->getMaxPrice() !== null, fn ($query) => $query->where('price', '<=', $dto->getMaxPrice()))
            ->when($dto->getOrderPrice() !== null, fn ($query) => $query->orderBy('price', $dto->getOrderPrice() === 'desc' ? 'desc' : 'asc'))
            ->when($dto->getOrderModel() !== null, fn ($query) => $query->orderBy('name', $dto->getOrderModel() === 'desc' ? 'desc' : 'asc'))
        ;
    }

    public function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id, array $relations = []): Car
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id);
    }

    public function create(array $fields, array $categories = []): Car
    {
        $car = Car::create($fields);

        return $car;
    }

    public function update(int $id, array $fields, array $categories = []): Car
    {
        $car = $this->getById($id);

        $car->update($fields);

        return $car;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }
}