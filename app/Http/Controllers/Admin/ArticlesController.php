<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
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

    public function store(
        ArticleRequest $request,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        TagsSyncServiceContract $tagsSync,
    ): RedirectResponse {
        $fields = $request->validated();
        $fields['published_at'] = $request->get('published') ? now() : null;
        
        $article = $this->repository->create($fields);

        $tagsSync->sync($article, $tagsRequest->get('tags', []));

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

    public function update(
        ArticleRequest $request,
        int $id,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        TagsSyncServiceContract $tagsSync,
    ): RedirectResponse {
        $fields = $request->validated();

        $article = $this->repository->update($id, $fields);

        $tagsSync->sync($article, $tagsRequest->get('tags', []));

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
