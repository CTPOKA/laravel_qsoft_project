<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Models\CarEngine;
use Illuminate\Support\Collection;

class CarEnginesRepository implements CarEnginesRepositoryContract
{
    public function __construct(private readonly CarEngine $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    private function getModel(): CarEngine
    {
        return $this->model;
    }
}