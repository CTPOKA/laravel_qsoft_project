<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface CarClassesRepositoryContract
{
    public function findAll(): Collection;
}