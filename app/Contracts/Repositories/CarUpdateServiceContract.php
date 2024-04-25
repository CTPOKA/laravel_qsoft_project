<?php

namespace App\Contracts\Repositories;

use App\Models\Car;

interface CarUpdateServiceContract
{
    public function update(int $id, array $fields, ?array $categories = null, ?array $tags = null): Car;
}