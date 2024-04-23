<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Price extends Component
{
    public function __construct(public readonly ?int $price)
    {
    }
    
    public function render(): View|Closure|string
    {
        return view('components.panels.price');
    }

    public function formattedPrice(): string
    {
        return $this->price ? number_format($this->price, 0, '.', ' ') . ' ₽' : '';
    }
}
