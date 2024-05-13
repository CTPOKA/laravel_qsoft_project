<?php

namespace App\Contracts\Repositories;

use App\Models\Basket;
use Illuminate\Support\Collection;

interface BasketsRepositoryContract
{
    public function getById(int $id, array $relations = []): Basket;

    public function findUserBaskets(int $userId, array $relations = []): Collection;

    public function getUserBasketsByCarId(int $userId, int $carId, array $relations = []): ?Basket;

    public function create(array $fields): Basket;

    public function update(Basket $basket, array $fields): Basket;

    public function delete(Basket $basket): void;

    public function countUserBaskets(int $userId): int;

    public function clearUserBaskets(int $userId): void;
}