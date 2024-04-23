<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\FlashMessageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CarsController extends Controller
{
    public function index(): Factory|View|Application
    {
        $cars = Car::orderByDesc('updated_at')->get();
        
        return view('pages.admin.cars.list', ['cars' => $cars]);
    }

    public function create(): Factory|View|Application
    {
        return view('pages.admin.cars.create');
    }

    public function store(CarRequest $request, FlashMessageContract $flashMessage): RedirectResponse
    {
        $fields = $request->validated();

        Car::create($fields);

        $flashMessage->success('Модель успешно создана');

        return redirect()->route('admin.cars.index');
    }

    public function show(Car $car)
    {
        //
    }

    public function edit(Car $car): Factory|View|Application
    {
        return view('pages.admin.cars.edit', ['car' => $car]);
    }

    public function update(CarRequest $request, Car $car, FlashMessageContract $flashMessage): RedirectResponse
    {
        $fields = $request->validated();

        $car->update($fields);

        $flashMessage->success('Модель успешно изменена');

        return back();
    }

    public function destroy(Car $car, FlashMessageContract $flashMessage): RedirectResponse
    {
        $car->delete();

        $flashMessage->success('Модель удалена');

        return back();
    }
}
