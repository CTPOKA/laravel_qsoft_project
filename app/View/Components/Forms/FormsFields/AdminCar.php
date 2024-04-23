<?php

namespace App\View\Components\Forms\FormsFields;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCar extends Component
{
    public function __construct(public readonly Car $car)
    {
    }

    public function render(): View|Closure|string
    {
        $carEngines = CarEngine::get();
        $carBodies = CarBody::get();
        $carClasses = CarClass::get();

        return view('components.forms.forms-fields.admin-car', [
            'carEngines' => $carEngines,
            'carBodies' => $carBodies,
            'carClasses' => $carClasses,
        ]);
    }
}
