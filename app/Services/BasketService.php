<?php

namespace App\Services;

use App\Contracts\Services\BasketServiceContract;
use App\Models\Basket;
use App\Repositories\BasketsRepository;
use Illuminate\Support\Collection;

class BasketService implements BasketServiceContract
{
    public function __construct(
        private readonly BasketsRepository $basketsRepository,
    ) {
    }

    public function addOne(array $fields): Basket
    {
        $userId = auth()->user()->id;

        $basket = $this->basketsRepository->getUserBasketsByCarId($userId, $fields['car_id']);

        if ($basket) {
            $this->basketsRepository->update($basket, ['count' => $basket->count + 1]);
        }
        else {
            $basket = $this->basketsRepository->create($fields);
        }

        return $basket;
    }

    public function findUserBaskets(array $relations = []): Collection
    {
        $userId = auth()->user()->id;

        return $this->basketsRepository->findUserBaskets($userId, $relations);
    }

    public function getUserBasketsByCarId(int $carId, array $relations = []): ?Basket
    {
        $userId = auth()->user()->id;

        return $this->basketsRepository->getUserBasketsByCarId($userId, $carId, $relations);
    }

    public function update(Basket $basket, array $fields): Basket
    {
        return $this->basketsRepository->update($basket, $fields);
    }

    public function delete(int $id): void
    {
        $basket = $this->basketsRepository->getById($id);

        $userId = auth()->user()->id;

        if ($basket->user_id === $userId) {
            $this->basketsRepository->delete($basket);
        }
    }

    public function countUserBaskets(): int
    {
        $userId = auth()->user()->id;

        return $this->basketsRepository->countUserBaskets($userId);
    }

    public function clearUserBaskets(): void
    {
        $userId = auth()->user()->id;

        $this->basketsRepository->clearUserBaskets($userId);
    }
}