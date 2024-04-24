<?php

namespace App\Contracts\Services;

use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;

interface CatalogDataCollectorContract
{
    public function collectCatalogData(
        CatalogFilterDTO $filterDTO,
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
    ): CatalogDataDTO;
}