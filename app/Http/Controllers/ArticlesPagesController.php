<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticlesRepositoryContract;

class ArticlesPagesController extends Controller
{
    public function __construct(public readonly ArticlesRepositoryContract $repository)
    {
    }

    public function articles()
    {
        $articles = $this->repository->findPublished();
        
        return view('pages.articles', ['articles' => $articles]);
    }

    public function article(int $id)
    {
        $article = $this->repository->getById($id);

        return view('pages.article', ['article' => $article]);
    }
}
