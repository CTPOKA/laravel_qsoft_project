<?php

namespace App\Contracts\Services;

use App\Models\Image;
use Illuminate\Http\File;

interface ImagesServiceContract
{
    public function saveFile(File | string $file): string;

    public function createImage(File | string $file): Image;

    public function url(string $path): string;

    public function deleteImage(Image | string $image);
}