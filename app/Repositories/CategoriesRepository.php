<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoriesRepository implements CategoriesRepositoryContract
{
    public function __construct(private readonly Category $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    private function getModel(): Category
    {
        return $this->model;
    }
}