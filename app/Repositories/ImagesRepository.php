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

    public function getById(int $id): ?Image
    {
        return $this->getModel()->find($id);
    }

    public function delete(int $id)
    {
        return $this->getModel()->where('id', $id)->delete();
    } 

    private function getModel(): Image
    {
        return $this->model;
    }
}