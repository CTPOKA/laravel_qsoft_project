<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarRemoveServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
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
        CarCreationServiceContract $createServise,
    ): RedirectResponse {
        $fields = $request->validated();
        $categories = $request->get('categories');
        $tags = $tagsRequest->get('tags', []);

        $createServise->create($fields, $categories, $tags);

        $flashMessage->success('Модель успешно создана');

        return redirect()->route('admin.cars.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id): Factory|View|Application
    {
        $car = $this->repository->getById($id, ['categories', 'image', 'images', 'tags']);

        return view('pages.admin.cars.edit', ['car' => $car]);
    }

    public function update(
        CarRequest $request,
        TagsRequest $tagsRequest,
        int $id,
        FlashMessageContract $flashMessage,
        CarUpdateServiceContract $updateServise,
    ): RedirectResponse {
        $fields = $request->validated();
        $categories = $request->get('categories');
        $tags = $tagsRequest->get('tags', []);

        $updateServise->update($id, $fields, $categories, $tags);

        $flashMessage->success('Модель успешно изменена');

        return back();
    }

    public function destroy(
        int $id,
        CarRemoveServiceContract $removeService,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $removeService->delete($id);

        $flashMessage->success('Модель удалена');

        return back();
    }
}
