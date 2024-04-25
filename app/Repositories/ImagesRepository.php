<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    public function __construct(private readonly Image $model)
    {
    }

    public function create(string $diskPath): Image
    {
        return $this->getModel()->create(['path' => $diskPath]);
    }

    private function getModel(): Image
    {
        return $this->model;
    }
}