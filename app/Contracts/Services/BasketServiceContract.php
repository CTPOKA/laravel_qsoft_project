<?php

namespace App\Contracts\Services;

use App\Models\Basket;
use Illuminate\Support\Collection;

interface BasketServiceContract
{
    public function addOne(array $fields): Basket;

    public function findUserBaskets(array $relations = []): Collection;

    public function getUserBasketsByCarId(int $carId, array $relations = []): ?Basket;

    public function update(Basket $basket, array $fields): Basket;

    public function delete(int $id): void;

    public function countUserBaskets(): int;

    public function clearUserBaskets(): void;
}