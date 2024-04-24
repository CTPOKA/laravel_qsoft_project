<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CategoriesRepositoryContract
{
    public function findAll(): Collection;
}