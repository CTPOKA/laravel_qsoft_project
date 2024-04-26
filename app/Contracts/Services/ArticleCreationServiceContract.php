<?php

namespace App\Contracts\Services;

use App\Models\Article;

interface ArticleCreationServiceContract
{
    public function create(array $fields, ?array $tags = null): Article;
}