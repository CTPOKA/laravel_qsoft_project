<?php

namespace App\Contracts\Repositories;

use App\Contracts\HasTagsContract;
use App\Models\Tag;
use Illuminate\Support\Collection;

interface TagsRepositoryContract extends FlashCacheRepositoryContract
{
    public function findOrCreateByName(string $name): Tag;

    public function syncTags(HasTagsContract $model, array $tags);

    public function deleteUnusedTags();

    public function articlesCount(): Collection;
}