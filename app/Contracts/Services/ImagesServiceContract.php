<?php

namespace App\Contracts\Services;

use App\Models\Image;

interface ImagesServiceContract
{
    public function saveFile(string $path): string;

    public function createImage(string $path): Image;

    public function url(string $path): string;
}