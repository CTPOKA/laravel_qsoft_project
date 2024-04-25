<?php

namespace App\Services;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Models\Image;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\File;

class ImagesService implements ImagesServiceContract
{
    public function __construct(
        private readonly FilesystemAdapter $disk,
        private readonly ImagesRepositoryContract $imagesRepository,
    ) {
    }

    public function saveFile(string $path): string
    {
        return $this->disk->putFile('', new File($path));
    }

    public function createImage(string $path): Image
    {
        return $this->imagesRepository->create($this->saveFile($path));
    }

    public function url(string $path): string
    {
        return $this->disk->url($path);
    }
}