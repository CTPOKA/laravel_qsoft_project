<?php

namespace App\Http\Controllers;

use App\Contracts\Services\BasketServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Http\Requests\BasketRequest;
use App\View\Components\Price;

class BasketController extends Controller
{
    public function __construct(
        public readonly BasketServiceContract $basketService,
    ) {
    }

    public function index()
    {
        $baskets = $this->basketService->findUserBaskets(['car', 'car.image']);

        if ($baskets->isEmpty()) {
            return redirect()->route('account');
        }

        return view('pages.basket', ['baskets' => $baskets]);
    }

    public function destroy(int $id, FlashMessageContract $flashMessage)
    {
        $this->basketService->delete($id);

        $flashMessage->success('Товар удален из корзины');

        return back();
    }

    public function addOne(BasketRequest $request, FlashMessageContract $flashMessage)
    {
        $fields = $request->validated();
        
        $this->basketService->addOne($fields);

        $flashMessage->success('Товар добавлен в корзину');

        return back();
    }

    public function update(BasketRequest $request)
    {
        $fields = $request->validated();
        
        $basket = $this->basketService->getUserBasketsByCarId($fields['car_id']);

        $this->basketService->update($basket, $fields);

        return back();
    }

    public function getBasketCost()
    {
        return (new Price(auth()->user()->basketCost))->formattedPrice();
    }
}
