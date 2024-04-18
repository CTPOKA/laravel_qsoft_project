<?php

namespace App\Services;

use App\Contracts\Services\FlashMessageContract;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class FlashMessage implements FlashMessageContract
{
    public function __construct(
        private readonly SessionManager|Store $store
    ) {  
    }

    public function error(array|string $messages): void
    {
        $this->flash('error_messages', collect((array) $messages));
    }

    public function success(array|string $messages): void
    {
        $this->flash('success_messages', collect((array) $messages));
    }

    public function errorMessages(): Collection
    {
        return $this->store->get('error_messages', collect());
    }

    public function successMessages(): Collection
    {
        return $this->store->get('success_messages', collect());
    }

    private function flash(string $type, Collection $messages): void
    {
        $this->store->flash($type, $messages);
    }
}