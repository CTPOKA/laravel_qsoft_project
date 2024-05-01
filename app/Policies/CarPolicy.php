<?php

namespace App\Policies;

use App\Contracts\Services\RolesServiceContract;
use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    public function __construct(
        private readonly RolesServiceContract $rolesService
    ) {
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Car|int $car): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function update(User $user, Car|int $car): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function delete(User $user, Car|int $car): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }
}
