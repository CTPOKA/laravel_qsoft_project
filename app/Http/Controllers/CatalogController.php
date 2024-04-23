<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(Request $request): Factory|View|Application
    {
        $cars = Car::query()
            ->when(($model = $request->get('model')) !== null, fn ($query) => $query->where('name', 'like', "%$model%"))
            ->when(($minPrice = $request->get('min_price')) !== null, fn ($query) => $query->where('price', '>=', $minPrice))
            ->when(($maxPrice = $request->get('max_price')) !== null, fn ($query) => $query->where('price', '<=', $maxPrice))
            ->when(($orderPrice = $request->get('order_price')) !== null, fn ($query) => $query->orderBy('price', $orderPrice === 'desc' ? 'desc' : 'asc'))
            ->when(($orderModel = $request->get('order_model')) !== null, fn ($query) => $query->orderBy('name', $orderModel === 'desc' ? 'desc' : 'asc'))
            ->get()
        ;

        return view('pages.catalog', ['cars' => $cars]);
    }

    public function products(Car $product): Factory|View|Application
    {
        $product->load(['carClass', 'carEngine', 'carBody']);

        return view('pages.product', ['product' => $product]);
    }
}
