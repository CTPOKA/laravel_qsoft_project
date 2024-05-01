<?php

namespace App\Contracts\Services;

interface RolesServiceContract
{
    public function userIsAdmin(int $userId): bool;
}