<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\DTO\ApiSalonModel;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SalonsRepository implements SalonsRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['api-salons'];
    }

    public function __construct(
        private readonly SalonsClientServiceContract $apiClient,
    ) {
    }

    public function findAll(): Collection
    {
        try {
            return Cache::tags($this->cacheTags())->remember(
                'salons',
                3600,
                fn () => $this->createCollectionFromResponse($this->apiClient->findAll())
            );
        } catch (RequestException $exception) {
            return Cache::tags($this->cacheTags())->remember('salons', 120, fn () => collect());
        }
    }

    public function findForMainPage(int $limit): Collection
    {
        try {
            return Cache::tags($this->cacheTags())->remember(
                "salons|$limit",
                300,
                fn () => $this->createCollectionFromResponse($this->apiClient->findForMainPage($limit))
            );
        } catch (RequestException $exception) {
            return Cache::tags($this->cacheTags())->remember("salons|$limit", 120, fn () => collect());
        }
    }

    private function createCollectionFromResponse($response): Collection
    {
        $salons = collect();

        foreach ($response as $salon) {
            $salons->push(new ApiSalonModel(
                $salon['name'],
                $salon['image'],
                $salon['address'],
                $salon['phone'],
                $salon['work_hours'],
            ));
        }

        return $salons;
    }
}