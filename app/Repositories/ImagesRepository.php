<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['images'];
    }

    public function __construct(private readonly Image $model)
    {
    }

    public function create(string $diskPath): Image
    {
        $image = $this->getModel()->create(['path' => $diskPath]);

        $this->flashCache();
        
        return $image;
    }

    public function getById(int $id): ?Image
    {
        return $this->getModel()->find($id);
    }

    public function delete(int $id)
    {
        $this->getModel()->where('id', $id)->delete();

        $this->flashCache();
    } 

    private function getModel(): Image
    {
        return $this->model;
    }
}