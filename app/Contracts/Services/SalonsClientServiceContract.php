<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    /**
     * @throws RequestException
     */
    public function findAll(): array;

    /**
     * @throws RequestException
     */
    public function findForMainPage(int $limit): array;
}