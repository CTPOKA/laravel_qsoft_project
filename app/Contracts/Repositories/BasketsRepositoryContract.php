<?php

namespace App\Contracts\Repositories;

use App\Models\Basket;
use Illuminate\Support\Collection;

interface BasketsRepositoryContract
{
    public function findAll(int $userId): Collection;

    public function getByCarId(int $carId, int $userId, array $relations = []): ?Basket;

    public function create(array $fields): Basket;

    public function update(Basket $basket, array $fields): Basket;

    public function delete(int $id): void;

    public function count(int $userId): int;

    public function clear(int $userId): void;
}