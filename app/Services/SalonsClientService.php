<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
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
    public function findAll(): array
    {
        return $this->getClient()
            ->withBasicAuth($this->user, $this->password)
            ->get('/salons')
            ->throw()
            ->json();
    }

    /**
     * @throws RequestException
     */
    public function findForMainPage(int $limit): array
    {
        return $this->getClient()
            ->withBasicAuth($this->user, $this->password)
            ->get("/salons?limit={$limit}&in_random_order")
            ->throw()
            ->json();
    }
}