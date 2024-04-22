<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\FlashMessageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticlesController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::orderBy('updated_at', 'desc')->get();
        
        return view('pages.admin.articles.list', ['articles' => $articles]);
    }

    public function create(): Factory|View|Application
    {
        return view('pages.admin.articles.create');
    }

    public function store(ArticleRequest $request, FlashMessageContract $flashMessage): RedirectResponse
    {
        $fields = $request->validated();
        $fields['published_at'] = $request->get('published') ? now() : null;
        
        Article::create($fields);

        $flashMessage->success('Новость успешно создана');

        return redirect()->route('admin.articles.index');
    }

    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article): Factory|View|Application
    {
        return view('pages.admin.articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article, FlashMessageContract $flashMessage)
    {
        $fields = $request->validated();
        if (is_null($article->published_at) && $request->get('published')) {
            $fields['published_at'] = now();
        } elseif (! is_null($article->published_at) && ! $request->get('published')) {
            $fields['published_at'] = null;
        }

        $article->update($fields);

        $flashMessage->success('Новость успешно изменена');

        return back();
    }

    public function destroy(Article $article, FlashMessageContract $flashMessage)
    {
        $article->delete();

        $flashMessage->success('Новость удалена');

        return back();
    }
}
