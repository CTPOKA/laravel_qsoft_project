<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Collection;

class ArticlesRepository implements ArticlesRepositoryContract
{
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
        return $this->getModel()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->limit($limit)
            ->get();
    }

    public function getModel(): Article
    {
        return $this->model;
    }

    public function getById(int $id): Article
    {
        return $this->getModel()->findOrFail($id);
    }

    public function create(array $fields): Article
    {
        return Article::create($fields);
    }

    public function update(int $id, array $fields): Article
    {
        $article = $this->getById($id);

        $published = $fields['published'];

        if (is_null($article->published_at) && $published) {
            $fields['published_at'] = now();
        } elseif (! is_null($article->published_at) && ! $published) {
            $fields['published_at'] = null;
        }

        $article->update($fields);
        
        return $article;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }
}