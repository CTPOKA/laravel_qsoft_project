<?php

namespace App\Repositories;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Models\Basket;
use Illuminate\Support\Collection;

class BasketsRepository implements BasketsRepositoryContract
{
    public function __construct(private readonly Basket $model)
    {
    }

    public function getById(int $id, array $relations = []): Basket
    {
        return $this->getModel()->where('id', $id);
    }

    public function findUserBaskets(int $userId, array $relations = []): Collection
    {
        return $this->getModel()
            ->where('user_id', $userId)
            ->when($relations, fn ($query) => $query->with($relations))
            ->get();
    }

    public function getUserBasketsByCarId(int $userId, int $carId, array $relations = []): ?Basket
    {
        return $this->getModel()
            ->where('car_id', $carId)
            ->where('user_id', $userId)
            ->when($relations, fn ($query) => $query->with($relations))
            ->first();
    }

    public function create(array $fields): Basket
    {
        return $this->getModel()->create($fields);
    }

    public function update(Basket $basket, array $fields): Basket
    {
        $basket->update($fields);

        return $basket;
    }

    public function delete(Basket $basket): void
    {
        $this->$basket->delete();
    }

    public function countUserBaskets(int $userId): int
    {
        return $this->getModel()->where('user_id', $userId)->count();
    }

    private function getModel(): Basket
    {
        return $this->model;
    }

    public function clearUserBaskets(int $userId): void
    {
        $this->getModel()->where('user_id', $userId)->delete();
    }
}