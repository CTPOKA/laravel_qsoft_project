<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract
{
    public function getModel(): Article;

    public function findAll(): Collection;

    public function findPublished(): Collection;

    public function findForMainPage(int $limit): Collection;

    public function getById(int $id): Article;

    public function create(array $fields): Article;

    public function update(int $id, array $fields): Article;

    public function delete(int $id): void;
}