<?php

namespace App\Repositories;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['tags'];
    }

    public function __construct(public readonly Tag $model)
    {
    }

    public function findOrCreateByName(string $name): Tag
    {
        $tag = $this->getModel()->firstOrCreate(['name' => $name]);

        $this->flashCache();

        return $tag;
    }

    public function syncTags(HasTagsContract $model, array $tags)
    {
        $model->tags()->sync($tags);

        $this->flashCache();
    }

    public function deleteUnusedTags()
    {
        $this->getModel()
            ->whereDoesntHave('cars')
            ->whereDoesntHave('articles')
            ->delete();
        
        $this->flashCache();
    }

    private function getModel(): Tag
    {
        return $this->model;
    }
}