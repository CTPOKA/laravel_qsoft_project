<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Requests\BasketRequest;
use Illuminate\Contracts\View\View;

class BasketController extends Controller
{
    public function __construct(public readonly BasketsRepositoryContract $repository)
    {
    }

    public function index(BasketRequest $request): View
    {
        $baskets = $this->repository->findAll($request->user()->id);

        return view('pages.basket', ['baskets' => $baskets]);
    }

    public function destroy(int $id, FlashMessageContract $flashMessage)
    {
        $this->repository->delete($id);

        $flashMessage->success('Товар удален из корзины');

        return back();
    }

    public function store(BasketRequest $request, FlashMessageContract $flashMessage)
    {
        $fields = $request->validated();
        $fields['user_id'] = $request->user()->id;
        
        $this->repository->create($fields);

        $flashMessage->success('Товар добавлен в корзину');

        return back();
    }
}
