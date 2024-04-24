<?php

namespace App\Contracts\Repositories;

use App\Contracts\HasTagsContract;
use App\Models\Tag;

interface TagsRepositoryContract
{
    public function findOrCreateByName(string $name): Tag;

    public function syncTags(HasTagsContract $model, array $tags);

    public function deleteUnusedTags();
}