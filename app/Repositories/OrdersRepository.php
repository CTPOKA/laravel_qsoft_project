<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Models\Order;
use Illuminate\Support\Collection;

class OrdersRepository implements OrdersRepositoryContract
{
    public function __construct(
        private readonly Order $model,
    ) {
    }

    public function findUserOrders(int $userId, array $relations = []): Collection
    {
        return $this->getModel()
            ->where('user_id', $userId)
            ->latest()
            ->when($relations, fn ($query) => $query->with($relations))
            ->get();
    }

    public function findAllUnpaid(array $relations = []): Collection
    {
        return $this->getModel()
            ->unpaid()
            ->when($relations, fn ($query) => $query->with($relations))
            ->get();
    }

    public function getById(int $id, array $relations = []): Order
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id);
    }

    public function create(array $fields): Order
    {
        return $this->getModel()->create($fields);
    }

    public function update(Order $order, array $fields): Order
    {
        $order->update($fields);

        return $order;
    }

    private function getModel(): Order
    {
        return $this->model;
    }
}
