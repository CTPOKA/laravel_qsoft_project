<?php

namespace App\Services;

use App\Contracts\Services\PayOrderClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class PayOrderClientService implements PayOrderClientServiceContract
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly string $user,
        private readonly string $password,
    ) {
    }

    private function getClient(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl);
    }

    /**
     * @throws RequestException
     */
    public function payOrder(int $orderId, int $totalCost): void
    {
        $this->getClient()
            ->withBasicAuth($this->user, $this->password)
            ->post('/order_payment', ['order_number' => $orderId, 'total_cost' => $totalCost])
            ->throw();
    }
}