<?php

namespace App\Contracts\Services;

interface ArticleRemoveServiceContract
{
    public function delete(int $id);
}