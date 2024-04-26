<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;

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
        return $this->getModel()
            ->with(['image'])
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    private function getModel(): Banner
    {
        return $this->model;
    }
}