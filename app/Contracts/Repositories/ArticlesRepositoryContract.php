<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract extends FlashCacheRepositoryContract
{
    public function findAll(): Collection;

    public function findPublished(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function paginate(
        array $fields = ['*'],
        int $page = 1,
        int $perPage = 8,
        string $pageName = 'page',
        array $relations = [],
    ): LengthAwarePaginator;

    public function getById(int $id, array $relations = []): Article;

    public function getBySlug(string $slug, array $relations = []): Article;

    public function create(array $fields): Article;

    public function update(Article $article, array $fields): Article;

    public function delete(int $id): void;

    public function count(): int;

    public function getLongestArticle(): Article;

    public function getShortestArticle(): Article;

    public function getMostTaggableArticle(): Article;
}