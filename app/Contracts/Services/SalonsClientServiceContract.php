<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    /**
     * @throws RequestException
     */
    public function find(?int $limit = null, bool $inRandomOrder = false): array;
}