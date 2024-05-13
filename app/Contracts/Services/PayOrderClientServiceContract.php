<?php

namespace App\Contracts\Services;

interface PayOrderClientServiceContract
{
    /**
     * @throws RequestException
     */
    public function payOrder(int $order_number, int $total_cost): void;
}