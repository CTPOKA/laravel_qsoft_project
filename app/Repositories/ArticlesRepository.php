<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticlesRepository implements ArticlesRepositoryContract
{
    use FlashCache;

    protected function cacheTags(): array
    {
        return ['articles'];
    }

    public function __construct(private readonly Article $model)
    {
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findPublished(): Collection
    {
        return $this->getModel()
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();
    }

    public function findForMainPage(int $limit): Collection
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember(
            "mainPageArticles|{$limit}",
            3600,
            fn() =>
            $this->getModel()
                ->whereNotNull('published_at')
                ->with(['image', 'tags'])
                ->orderByDesc('published_at')
                ->limit($limit)
                ->get()
        );
    }

    public function paginate(
        array $fields = ['*'],
        int $page = 1,
        int $perPage = 8,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember(
            sprintf('paginateForCatalog|%s|',
                serialize([
                    'fields' => $fields,
                    'perPage' => $perPage,
                    'page' => $page,
                    'pageName' => $pageName,
                    'relations' => $relations,
                ])
            ),
            3600,
            fn () => $this->getModel()
                ->whereNotNull('published_at')
                ->when($relations, fn ($query) => $query->with($relations))
                ->orderBy('published_at', 'desc')
                ->paginate($perPage, $fields, $pageName, $page)
        );
    }

    private function getModel(): Article
    {
        return $this->model;
    }

    public function getById(int $id, array $relations = []): Article
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id);
    }

    public function getBySlug(string $slug, array $relations = []): Article
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember(
            sprintf('articlesBySlug|%s|%s', $slug, implode('|', $relations)),
            3600,
            fn() =>
            $this->getModel()
                ->when($relations, fn ($query) => $query->with($relations))
                ->where('slug', $slug)->get()->first()
        );
    }

    public function create(array $fields): Article
    {
        return $this->getModel()->create($fields);
    }

    public function update(Article $article, array $fields): Article
    {
        $article->update($fields);
        
        return $article;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function count(): int
    {
        return $this->getModel()->count();
    }

    public function getLongestArticle(): Article
    {
        return $this->getModel()
            ->select('title', 'id', DB::raw('CHAR_LENGTH(body) as body_length'))
            ->orderByDesc('body_length')
            ->first();
    }

    public function getShortestArticle(): Article
    {
        return $this->getModel()
            ->select('title', 'id', DB::raw('CHAR_LENGTH(body) as body_length'))
            ->orderBy('body_length')
            ->first();
    }

    public function getMostTaggableArticle(): Article
    {
        return $this->getModel()
            ->select('title', 'id')
            ->withCount('tags')
            ->orderByDesc('tags_count')
            ->first();
    }
}