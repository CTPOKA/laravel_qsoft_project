<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesPagesController extends Controller
{
    public function articles()
    {
        $articles = Article::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();
        
        return view('pages.articles', ['articles' => $articles]);
    }

    public function article(Article $article)
    {        
        return view('pages.article', ['article' => $article]);
    }
}
