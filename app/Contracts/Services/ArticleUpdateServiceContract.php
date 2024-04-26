<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface ArticleUpdateServiceContract
{
    public function update(int $id, array $fields, ?array $tags = null): Article;
}