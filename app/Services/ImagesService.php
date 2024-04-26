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

    public function saveFile(File | string $file): string
    {
        if (! $file instanceof File) {
            $file = new File($file);
        }

        return $this->disk->putFile('', $file);
    }

    public function createImage(File | string $file): Image
    {
        if (! $file instanceof File) {
            $file = new File($file);
        }

        return $this->imagesRepository->create($this->saveFile($file));
    }

    public function url(string $path): string
    {
        return $this->disk->url($path);
    }

    public function deleteImage(Image | string $image)
    {
        if (! $image instanceof File) {
            $image = $this->imagesRepository->getById($image);
            if (! $image) {
                return;
            }
        }

        $this->disk->delete($image->path);

        $this->imagesRepository->delete($image->id);
    }
}