<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
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
        CategoriesRepositoryContract $categoriesRepository,
        CatalogDataCollectorContract $dataCollector,
        ?string $slug = null,
    ): Factory|View|Application {
        $allCateriries = [];
        $category = null;

        if ($slug) {
            $category = $categoriesRepository->findBySlug($slug, ['descendants']);
            $allCateriries = $category->descendants->pluck('id')->push($category->id)->all();
        }

        $filterDTO = (new CatalogFilterDTO)
            ->setModel($request->get('model'))
            ->setMinPrice($request->get('min_price'))
            ->setMaxPrice($request->get('max_price'))
            ->setOrderPrice($request->get('order_price'))
            ->setOrderModel($request->get('order_model'))
            ->setAllCategories($slug ? $allCateriries : []);
        ;

        $catalogData = $dataCollector->collectCatalogData(
            $filterDTO, 
            8,
            $request->get('page') ?? 1,
        );

        return view('pages.catalog', ['catalogData' => $catalogData]);
    }

    public function products(int $id, CarsRepositoryContract $repository): Factory|View|Application
    {
        $product = $repository->getById($id, ['carClass', 'carEngine', 'carBody', 'tags', 'image', 'images']);

        return view('pages.product', ['product' => $product]);
    }
}
