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
    public function find(?int $limit = null, bool $inRandomOrder = false): array
    {
        $parametrs = [];

        if ($limit !== null) {
            $parametrs['limit'] = $limit;
        }

        if ($inRandomOrder) {
            $parametrs['in_random_order'] = true;
        }

        return $this->getClient()
            ->withBasicAuth($this->user, $this->password)
            ->get('/salons', $parametrs)
            ->throw()
            ->json();
    }
}