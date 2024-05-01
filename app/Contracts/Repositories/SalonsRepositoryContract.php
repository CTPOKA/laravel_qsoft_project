<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface SalonsRepositoryContract extends FlashCacheRepositoryContract
{
    public function findAll(): Collection;

    public function findForMainPage(int $limit): Collection;
}