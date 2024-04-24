<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use Illuminate\Http\Request;

class ArticlesPagesController extends Controller
{
    public function __construct(public readonly ArticlesRepositoryContract $repository)
    {
    }

    public function articles(Request $request)
    {
        $articles = $this->repository->paginate(
            ['*'],
            $request->get('page') ?? 1,
            4, 
        );

        return view('pages.articles', ['articles' => $articles]);
    }

    public function article(int $id)
    {
        $article = $this->repository->getById($id);

        return view('pages.article', ['article' => $article]);
    }
}
