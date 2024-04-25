<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CarEnginesRepositoryContract
{
    public function findAll(): Collection;
}