<?php

namespace App\Services;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\BasketServiceContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Contracts\Services\PayOrderClientServiceContract;
use App\Models\Order;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;

class OrdersService implements OrdersServiceContract
{
    public function __construct(
        private readonly OrdersRepositoryContract $ordersRepository,
        private readonly BasketServiceContract $basketService,
        private readonly PayOrderClientServiceContract $payOrderClientService,
    ) {
    }

    public function payOrder(int $id): Order
    {
        $order = $this->ordersRepository->getById($id);
        if ($order->status === 'Оплачен') {
            return $order;
        }

        try {
            $this->payOrderClientService->payOrder($order->id, $order->total_cost);
            $order->status = 'Оплачен';
        } catch (RequestException $exception) {
            $order->status = 'Ошибка оплаты';
        }

        $order->save();

        return $order;
    }

    public function findUserOrders(int $userId, array $relations = []): Collection
    {
        return $this->ordersRepository->findUserOrders($userId);
    }
    
    public function findAllUnpaid(array $relations = []): Collection
    {
        return $this->ordersRepository->findAllUnpaid($relations);
    }

    public function create(array $fields): Order
    {
        $order = $this->ordersRepository->create($fields);

        $baskets = $this->basketService->findUserBaskets();

        foreach ($baskets as $basket) {
            $order->cars()->attach($basket->car_id, ['cost' => $basket->car->price, 'count' => $basket->count]);
        }

        return $order;
    }

    public function update(Order $order, array $fields): Order
    {
        return $this->ordersRepository->update($order, $fields);
    }
}
