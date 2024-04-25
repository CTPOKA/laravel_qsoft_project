<?php

namespace App\Contracts\Repositories;

use App\Models\Image;

interface ImagesRepositoryContract
{
    public function create(string $diskPath): Image;
}