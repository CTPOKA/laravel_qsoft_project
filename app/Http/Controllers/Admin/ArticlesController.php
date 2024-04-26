<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\ArticleCreationServiceContract;
use App\Contracts\Services\ArticleRemoveServiceContract;
use App\Contracts\Services\ArticleUpdateServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use App\Repositories\ArticlesRepository;
use Exception;
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
        ArticleCreationServiceContract $createServise,
    ): RedirectResponse {
        $fields = $request->validated();
        $tags = $tagsRequest->get('tags', []);

        try {
            $createServise->create($fields, $tags);

            $flashMessage->success('Новость успешно создана');
        } catch (Exception $exception) {
            $flashMessage->error($exception->getMessage());
        }

        return redirect()->route('admin.articles.index');
    }

    public function show(int $id)
    {
        //
    }

    public function edit(int $id): Factory|View|Application
    {
        $article = $this->repository->getById($id, ['image', 'tags']);

        return view('pages.admin.articles.edit', ['article' => $article]);
    }

    public function update(
        ArticleRequest $request,
        int $id,
        TagsRequest $tagsRequest,
        FlashMessageContract $flashMessage,
        ArticleUpdateServiceContract $updateServise,
    ): RedirectResponse {
        $fields = $request->validated();
        $tags = $tagsRequest->get('tags', []);

        try {
            $updateServise->update($id, $fields, $tags);

            $flashMessage->success('Новость успешно изменена');
        } catch (Exception $exception) {
            $flashMessage->error($exception->getMessage());
        }

        return back();
    }

    public function destroy(
        int $id,
        ArticleRemoveServiceContract $removeService,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        try {
            $removeService->delete($id);

            $flashMessage->success('Новость удалена');
        } catch (Exception $exception) {
            $flashMessage->error($exception->getMessage());
        }

        return back();
    }
}
