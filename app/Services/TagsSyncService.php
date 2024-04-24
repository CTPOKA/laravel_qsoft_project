<?php

namespace App\Services;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\TagsSyncServiceContract;

class TagsSyncService implements TagsSyncServiceContract
{
    public function __construct(private readonly TagsRepositoryContract $tagsRepository)
    {
    }

    public function sync(HasTagsContract $model, array $tags)
    {
        $tagsToSync = collect();

        foreach ($tags as $tag) {
            $tagsToSync->push($this->tagsRepository->findOrCreateByName($tag));
        }

        $this->tagsRepository->syncTags($model, $tagsToSync->pluck('id')->all());

        $this->tagsRepository->deleteUnusedTags();
    }
}