<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

trait FlashCache
{
    abstract protected function cacheTags(): array;

    public function FlashCache(): void
    {
        Cache::tags($this->cacheTags())->flush();
    }
}