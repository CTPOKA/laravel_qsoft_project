<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface FlashMessageContract
{
    public function error(array|string $messages): void;

    public function success(array|string $messages): void;

    public function errorMessages(): Collection;

    public function successMessages(): Collection;
}