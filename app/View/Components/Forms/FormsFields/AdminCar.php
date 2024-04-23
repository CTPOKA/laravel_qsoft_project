<?php

namespace App\View\Components\Forms\FormsFields;

use App\Contracts\Repositories\CarBodiesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCar extends Component
{
    public function __construct(
        public readonly Car $car,
        public readonly CarEnginesRepositoryContract $enginesRepository,
        public readonly CarBodiesRepositoryContract $bodiesRepository,
        public readonly CarClassesRepositoryContract $classesRepository,
    ) {
    }

    public function render(): View|Closure|string
    {
        $carEngines = $this->enginesRepository->findAll();
        $carBodies = $this->bodiesRepository->findAll();
        $carClasses = $this->classesRepository->findAll();

        return view('components.forms.forms-fields.admin-car', [
            'carEngines' => $carEngines,
            'carBodies' => $carBodies,
            'carClasses' => $carClasses,
        ]);
    }
}
