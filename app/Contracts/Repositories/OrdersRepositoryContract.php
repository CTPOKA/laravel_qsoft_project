<?php

namespace App\Contracts\Repositories;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrdersRepositoryContract
{
    public function findUserOrders(int $userId, array $relations = []): Collection;

    public function findAllUnpaid(array $relations = []): Collection;

    public function getById(int $id, array $relations = []): Order;

    public function create(array $fields): Order;

    public function update(Order $order, array $fields): Order;
}