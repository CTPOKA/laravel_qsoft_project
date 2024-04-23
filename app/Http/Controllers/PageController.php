<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Http\Request;

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
        return view('pages.clients');
    }
}
