<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CarBodiesRepositoryContract
{
    public function findAll(): Collection;
}