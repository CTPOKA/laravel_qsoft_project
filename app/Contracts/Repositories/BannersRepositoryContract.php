<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface BannersRepositoryContract
{
    public function findAll(): Collection;

    public function findForMainPage(int $limit): Collection;
}