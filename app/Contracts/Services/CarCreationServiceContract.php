<?php

namespace App\Contracts\Services;

use App\Models\Car;

interface CarCreationServiceContract
{
    public function create(array $fields, array $categories = [], ?array $tags = null): Car;
}