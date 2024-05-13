<?php

namespace App\Http\Controllers;

use App\Contracts\Services\BasketServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(public readonly OrdersServiceContract $ordersService)
    {
    }

    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $orders = $this->ordersService->findUserOrders($userId);

        return view('pages.account', ['orders' => $orders]);
    }

    public function store(OrderRequest $request, FlashMessageContract $flashMessage, BasketServiceContract $basketService)
    {
        $fields = $request->validated();
        $this->ordersService->create($fields);

        $basketService->clearUserBaskets($fields['user_id']);

        $flashMessage->success('Заказ добавлен');
        
        return back();
    }
}
