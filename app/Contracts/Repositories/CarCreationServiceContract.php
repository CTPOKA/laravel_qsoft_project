<?php

namespace App\Contracts\Repositories;

use App\Models\Car;

interface CarCreationServiceContract
{
    public function create(array $fields, array $categories = [], ?array $tags = null): Car;
}