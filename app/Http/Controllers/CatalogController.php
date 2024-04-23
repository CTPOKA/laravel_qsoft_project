<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(
        Request $request, 
        CatalogDataCollectorContract $dataCollector,
    ): Factory|View|Application {
        $filterDTO = (new CatalogFilterDTO)
            ->setModel($request->get('model'))
            ->setMinPrice($request->get('min_price'))
            ->setMaxPrice($request->get('max_price'))
            ->setOrderPrice($request->get('order_price'))
            ->setOrderModel($request->get('order_model'));

        $catalogData = $dataCollector->collectCatalogData(
            $filterDTO, 
            8, 
            $request->get('page') ?? 1,
        );
        
        return view('pages.catalog', ['catalogData' => $catalogData]);
    }

    public function products(int $id, CarsRepositoryContract $repository): Factory|View|Application
    {
        $product = $repository->getById($id, ['carClass', 'carEngine', 'carBody']);

        return view('pages.product', ['product' => $product]);
    }
}
