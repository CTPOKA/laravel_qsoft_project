<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract
{
    public function getModel(): Article;

    public function findAll(): Collection;

    public function findPublished(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function paginate(
        array $fields = ['*'],
        int $page = 1,
        int $perpage = 8,
        string $pageName = 'page',
    ): LengthAwarePaginator;

    public function getById(int $id): Article;

    public function create(array $fields): Article;

    public function update(int $id, array $fields): Article;

    public function delete(int $id): void;
}