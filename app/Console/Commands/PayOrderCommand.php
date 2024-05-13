<?php

namespace App\Console\Commands;

use App\Contracts\Services\OrdersServiceContract;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PayOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pay-order {orderId?*} {--a|all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pay orders';

    /**
     * Execute the console command.
     */
    public function handle(OrdersServiceContract $orderService)
    {
        $ordersId = $this->argument('orderId');
        
        if ($this->option('all')) {
            $ordersId = $orderService->findAllUnpaid()->pluck('id');
        } else if (empty($ordersId)){
            $this->error("Аргумент orderId не указан");
            return;
        }

        foreach ($ordersId as $orderId) {
            try {
                $order = $orderService->payOrder($orderId);
                if ($order->status === 'Оплачен') {
                    $this->info("Заказ №{$orderId} успешно оплачен");
                } else {
                    $this->error("Заказ №{$orderId} - Ошибка оплаты");
                }
            } catch (ModelNotFoundException $exception) {
                $this->error("Заказ №{$orderId} не найден");
            }
        }
    }
}
