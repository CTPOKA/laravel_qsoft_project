<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $articles = Article::orderBy('published_at', 'desc')->take(3)->get();
        return view('pages.homepage', ['articles' => $articles]);
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
