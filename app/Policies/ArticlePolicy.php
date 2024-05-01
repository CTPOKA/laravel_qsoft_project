<?php

namespace App\Policies;

use App\Contracts\Services\RolesServiceContract;
use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function __construct(
        private readonly RolesServiceContract $rolesService
    ) {
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article|int $article): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function update(User $user, Article|int $article): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }

    public function delete(User $user, Article|int $article): bool
    {
        return $this->rolesService->userIsAdmin($user->id);
    }
}
