<?php

namespace App\Contracts\Services;

interface SalonsClientServiceContract
{
    /**
     * @throws RequestException
     */
    public function find(): array;
}