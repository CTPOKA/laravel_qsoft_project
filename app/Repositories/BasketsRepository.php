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

    public function findAll(int $userId): Collection
    {
        return $this->getModel()->where('user_id', $userId)->get();
    }

    public function getByCarId(int $carId, int $userId, array $relations = []): ?Basket
    {
        return $this->getModel()->where('car_id', $carId)->where('user_id', $userId)->first();
    }

    public function create(array $fields): Basket
    {
        $basket = $this->getByCarId($fields['car_id'], $fields['user_id']);

        if ($basket) {
            $this->update($basket, ['count' => $basket->count + 1]);
            return $basket;
        }
        else {
            return $this->getModel()->create($fields);
        }
    }

    public function update(Basket $basket, array $fields): Basket
    {
        $basket->update($fields);

        return $basket;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function count(int $userId): int
    {
        return $this->getModel()->where('user_id', $userId)->count();
    }

    private function getModel(): Basket
    {
        return $this->model;
    }
}