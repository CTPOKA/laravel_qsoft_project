<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CarsController extends Controller
{
    public function __construct(
        public readonly CarsRepositoryContract $repository,
    ) {
    }

    public function index(): Factory|View|Application
    {
        $cars = $this->repository->findAll()->sortByDesc('updated_at');
        
        return view('pages.admin.cars.list', ['cars' => $cars]);
    }

    public function create(): Factory|View|Application
    {
        return view('pages.admin.cars.create');
    }

    public function store(
        CarRequest $request,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        TagsSyncServiceContract $tagsSync,
    ): RedirectResponse {
        $fields = $request->validated();

        $car = $this->repository->create($fields);

        $categories = $request->get('categories');

        $car->categories()->sync($categories);

        $tagsSync->sync($car, $tagsRequest->get('tags', []));

        $flashMessage->success('Модель успешно создана');

        return redirect()->route('admin.cars.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id): Factory|View|Application
    {
        $car = $this->repository->getById($id);

        return view('pages.admin.cars.edit', ['car' => $car]);
    }

    public function update(
        CarRequest $request,
        TagsRequest $tagsRequest,
        int $id,
        FlashMessageContract $flashMessage,
        TagsSyncServiceContract $tagsSync,
    ): RedirectResponse {
        $fields = $request->validated();

        $car = $this->repository->update($id, $fields);

        $categories = $request->get('categories');

        $car->categories()->sync($categories);

        $tagsSync->sync($car, $tagsRequest->get('tags', []));

        $flashMessage->success('Модель успешно изменена');

        return back();
    }

    public function destroy(int $id, FlashMessageContract $flashMessage): RedirectResponse
    {
        $this->repository->delete($id);

        $flashMessage->success('Модель удалена');

        return back();
    }
}
