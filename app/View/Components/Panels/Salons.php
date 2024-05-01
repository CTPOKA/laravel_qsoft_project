<?php

namespace App\View\Components\Panels;

use App\Contracts\Repositories\SalonsRepositoryContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Salons extends Component
{
    public function __construct(public readonly SalonsRepositoryContract $repository)
    {
    }

    public function render(): View|Closure|string
    {
        $salons = $this->repository->findForMainPage(2);

        return view('components.panels.salons', ['salons' => $salons]);
    }
}
