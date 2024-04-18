<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();
        
        return view('pages.admin.articles.list', ['articles' => $articles]);
    }

    public function create()
    {
        return view('pages.admin.articles.create');
    }

    public function store(Request $request)
    {

    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('pages.admin.articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        //
    }
}
