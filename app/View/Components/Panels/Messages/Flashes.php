<?php

namespace App\View\Components\Panels\Messages;

use App\Contracts\Services\FlashMessageContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flashes extends Component
{
    public function __construct(public readonly FlashMessageContract $flashMessages)
    {
    }

    public function render(): View|Closure|string
    {
        $errors = $this->flashMessages->errorMessages();
        $success = $this->flashMessages->successMessages();
        return view('components.panels.messages.flashes', ['errors' => $errors, 'success' => $success]);
    }
}
