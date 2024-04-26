<?php

namespace App\Contracts\Repositories;

use App\Models\Image;

interface ImagesRepositoryContract extends FlashCacheRepositoryContract
{
    public function create(string $diskPath): Image;

    public function getById(int $id): ?Image;

    public function delete(int $id);
}