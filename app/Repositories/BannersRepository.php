<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{
    public function __construct(private readonly Banner $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findForMainPage(int $limit): Collection
    {
        return Cache::tags(['banners', 'images'])->remember(
            "mainPageBanners|{$limit}",
            3600,
            fn() =>
            $this->getModel()
                ->with(['image'])
                ->inRandomOrder()
                ->limit($limit)
                ->get()
        );
    }

    private function getModel(): Banner
    {
        return $this->model;
    }
}