<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['cars'];
    }

    public function __construct(private readonly Car $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForMainPage(int $limit): Collection
    {
        return Cache::tags(['cars', 'images'])->remember(
            "mainPageCars|{$limit}",
            3600,
            fn() =>
            $this->getModel()
                ->where('is_new', true)
                ->with(['image'])
                ->inRandomOrder()
                ->limit($limit)
                ->get()
        );
    }

    public function findForCatalog(CatalogFilterDTO $filterDTO, array $fields = ['*']): Collection
    {
        return $this->catalogQuery($filterDTO)->get($fields);
    }

    public function paginateForCatalog(
        CatalogFilterDTO $filterDTO,
        array $fields = ['*'],
        int $perPage = 8,
        int $page = 1,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator
    {
        return $this->catalogQuery($filterDTO)
        ->when($relations, fn ($query) => $query->with($relations))
        ->paginate($perPage, $fields, $pageName, $page);
        return Cache::tags(['cars', 'images', 'tags', 'carEngines', 'carBodies', 'carClasses'])->remember(
            sprintf('paginateForCatalog|%s|',
                serialize([
                    'filter' => $filterDTO,
                    'fields' => $fields,
                    'perPage' => $perPage,
                    'page' => $page,
                    'pageName' => $pageName,
                    'relations' => $relations,
                ])
            ),
            3600,
            fn () => $this->catalogQuery($filterDTO)
                ->when($relations, fn ($query) => $query->with($relations))
                ->paginate($perPage, $fields, $pageName, $page)
        );
    }

    private function catalogQuery(CatalogFilterDTO $dto): Builder
    {
        return $this->getModel()
            ->when($dto->getModel() !== null, fn ($query) => $query->where('name', 'like', "%{$dto->getModel()}%"))
            ->when($dto->getMinPrice() != null, fn ($query) => $query->where('price', '>=', $dto->getMinPrice()))
            ->when($dto->getMaxPrice() != null, fn ($query) => $query->where('price', '<=', $dto->getMaxPrice()))
            ->when($dto->getOrderPrice() !== null, fn ($query) => $query->orderBy('price', $dto->getOrderPrice() === 'desc' ? 'desc' : 'asc'))
            ->when($dto->getOrderModel() !== null, fn ($query) => $query->orderBy('name', $dto->getOrderModel() === 'desc' ? 'desc' : 'asc'))
            ->when(! empty($dto->getAllCategories()), fn ($query) => $query->whereHas('categories', fn ($query) => $query->whereIn('id', $dto->getAllCategories())))
        ;
    }

    private function getModel(): Car
    {
        return $this->model;
    }

    public function getById(int $id, array $relations = []): Car
    {
        return Cache::tags(['cars', 'images', 'tags', 'carEngines', 'carBodies', 'carClasses'])->remember(
            sprintf('carsById|%s|%s', $id, implode('|', $relations)),
            3600,
            fn () => $this->getModel()
                ->when($relations, fn ($query) => $query->with($relations))
                ->findOrFail($id)
        );
    }

    public function create(array $fields): Car
    {
        return $this->getModel()->create($fields);
    }

    public function update(Car $car, array $fields): Car
    {
        $car->update($fields);

        return $car;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function syncCategories(Car $car, array $categories = []): Car
    {
        $car->categories()->sync($categories);

        return $car;
    }

    public function count(): int
    {
        return $this->getModel()->count();
    }
}