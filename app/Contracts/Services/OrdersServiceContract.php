<?php

namespace App\Contracts\Services;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrdersServiceContract
{
    /**
     * @throws RequestException
     */
    public function payOrder(int $id): Order;

    public function findUserOrders(int $userId, array $relations = []): Collection;

    public function findAllUnpaid(array $relations = []): Collection;

    public function create(array $fields): Order;

    public function update(Order $order, array $fields): Order;
}
