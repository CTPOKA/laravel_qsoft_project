<?php

namespace App\Repositories;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    public function __construct(public readonly Tag $model)
    {
    }

    public function findOrCreateByName(string $name): Tag
    {
        return $this->getModel()->firstOrCreate(['name' => $name]);
    }

    public function syncTags(HasTagsContract $model, array $tags)
    {
        $model->tags()->sync($tags);
    }

    public function deleteUnusedTags()
    {
        $this->getModel()
            ->whereDoesntHave('cars')
            ->whereDoesntHave('articles')
            ->delete();
    }

    private function getModel(): Tag
    {
        return $this->model;
    }
}