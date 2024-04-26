<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoriesRepository implements CategoriesRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['categories'];
    }

    public function __construct(private readonly Category $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getTree(?int $maxDepth = null): Collection
    {
        return Cache::tags($this->cacheTags())->remember(
            "catalogTree|{$maxDepth}",
            3600,
            fn () => $this->getModel()
                ->withDepth()
                ->when($maxDepth, fn ($query) => $query->having('depth', '<=', $maxDepth))
                ->orderBy('sort')
                ->get()
                ->toTree()
        );
    }

    public function findBySlug(string $slug, array $relations = []): Category
    {
        return Cache::tags($this->cacheTags())->remember(
            sprintf('categoryBySlug|%s|%s', $slug, implode('|', $relations)),
            3600,
            fn () => $this->getModel()
                ->where('slug', $slug)
                ->when($relations, fn ($query) => $query->with($relations))
                ->firstOrFail()
        );
    }

    private function getModel(): Category
    {
        return $this->model;
    }
}