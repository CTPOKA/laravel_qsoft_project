<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function __construct(public readonly OrdersRepositoryContract $repository)
    {
    }

    public function index(OrderRequest $request)
    {
        $userId = $request->user()->id;
        $orders = $this->repository->findAll($userId);

        return view('pages.account', ['orders' => $orders]);
    }

    public function store(OrderRequest $request, FlashMessageContract $flashMessage)
    {
        $fields = $request->validated();
        
        $this->repository->create($fields);

        $flashMessage->success('Заказ добавлен');

        return back();
    }
}
