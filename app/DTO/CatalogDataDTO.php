<?php

namespace App\DTO;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CatalogDataDTO
{
    public function __construct(
        public readonly CatalogFilterDTO $filterDTO,
        public readonly LengthAwarePaginator $cars,
    ) {
    }
}