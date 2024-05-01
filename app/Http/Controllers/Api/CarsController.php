<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoveServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateCarRequest;
use App\Http\Requests\Api\UpdateCarRequest;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(Request $request, CarsRepositoryContract $carsRepository)
    {
        return CarResource::collection($carsRepository->paginateForCatalog(
            new CatalogFilterDTO(),
            ['id', 'name', 'body', 'price', 'old_price', 'car_body_id'],
            $request->get('perPage', 10),
            $request->get('page', 1),
            'page',
        ));
    }

    public function store(CreateCarRequest $request, CarCreationServiceContract $creationService)
    {
        return new CarResource($creationService->create($request->validated()));
    }

    public function show($id, CarsRepositoryContract $carsRepository)
    {
        return $carsRepository->getById($id, ['image:id,path']);
    }

    public function update(UpdateCarRequest $request, $id, CarUpdateServiceContract $updateService)
    {
        return new CarResource($updateService->update($id, $request->validated()));
    }

    public function destroy($id, CarRemoveServiceContract $removeService)
    {
        $removeService->delete($id);

        return [$id];
    }
}
