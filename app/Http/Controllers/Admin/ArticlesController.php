<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\FlashMessageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticlesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ArticlesController extends Controller
{
    public function __construct(public readonly ArticlesRepository $repository)
    {
    }

    public function index(): Factory|View|Application
    {
        $articles = $this->repository->findAll()->sortByDesc('updated_at');
        
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
        
        $this->repository->create($fields);

        $flashMessage->success('Новость успешно создана');

        return redirect()->route('admin.articles.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id): Factory|View|Application
    {
        $article = $this->repository->getById($id);

        return view('pages.admin.articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, int $id, FlashMessageContract $flashMessage): RedirectResponse
    {
        $fields = $request->validated();

        $this->repository->update($id, $fields);

        $flashMessage->success('Новость успешно изменена');

        return back();
    }

    public function destroy(int $id, FlashMessageContract $flashMessage): RedirectResponse
    {
        $this->repository->delete($id);

        $flashMessage->success('Новость удалена');

        return back();
    }
}
