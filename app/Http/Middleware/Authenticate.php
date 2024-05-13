<?php

namespace App\Http\Middleware;

use App\Contracts\Services\FlashMessageContract;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        $flashMessage = app()->make(FlashMessageContract::class);
        $flashMessage->error('Вы не авторизованы');
        return $request->expectsJson() ? null : route('login');
    }
}
