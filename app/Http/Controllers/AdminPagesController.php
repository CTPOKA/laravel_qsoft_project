<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function admin()
    {
        return view('pages.admin.admin');
    }
    
    public function articles()
    {
        $articles = Article::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();
        
        return view('pages.admin.articles', ['articles' => $articles]);
    }
}
