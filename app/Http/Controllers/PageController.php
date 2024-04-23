<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        $cars = Car::where('is_new', true)
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $articles = Article::whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();
        
        return view('pages.homepage', ['articles' => $articles], ['cars' => $cars]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function sale()
    {
        return view('pages.sale');
    }

    public function finance()
    {
        return view('pages.finance');
    }

    public function clients()
    {
        $cars = Car::with(['carEngine', 'carBody', 'carClass'])->get();

        $averagePrice = $cars->avg->price;

        $averageDiscountedPrice = $cars->whereNotNull('old_price')->avg('price');

        $mostExpensiveModel = $cars->sortByDesc('price')->first();

        $uniqueSalons = $cars->pluck('salon')->unique();

        $sortedEngines = $cars->pluck('carEngine.name')->sort();

        $sortedClassNames = $cars
            ->pluck('carClass.name')
            ->unique()
            ->sort()
            ->mapWithKeys(fn ($item) => [Str::slug($item) => $item]);
        
        $discountedModels = $cars
            ->whereNotNull('old_price')
            ->filter(fn ($car) => preg_match('/[56]/', $car->name . $car->kpp . $car->carEngine->name));
        
        $averagePricesByBodyType = $cars
            ->each(function ($car) {
                $car->old_price = $car->old_price ?: $car->price;
            })
            ->groupBy('carBody.name')
            ->map(function ($car) {
                return $car->avg('old_price');
            })
            ->sort();

        return view('pages.clients', [
            'averagePrice' => $averagePrice,
            'averageDiscountedPrice' => $averageDiscountedPrice,
            'mostExpensiveModel' => $mostExpensiveModel,
            'uniqueSalons' => $uniqueSalons,
            'sortedEngines' => $sortedEngines,
            'sortedClassNames' => $sortedClassNames,
            'discountedModels' => $discountedModels,
            'averagePricesByBodyType' => $averagePricesByBodyType,
        ]);
    }
}
