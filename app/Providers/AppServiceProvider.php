<?php

namespace App\Providers;

use App\Contracts\Services\FlashMessageContract;
use App\Services\FlashMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(FlashMessage::class, fn () => new FlashMessage(session()));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['panels.left_information_menu' , 'panels.footer_navigation'], function (\Illuminate\View\View $view) {
            $view->with('menu', [
                [
                    'title' => 'О компании',
                    'route' => 'about',
                ],
                [
                    'title' => 'Контактная информация',
                    'route' => 'contacts',
                ],
                [
                    'title' => 'Условия продаж',
                    'route' => 'sale',
                ],
                [
                    'title' => 'Финансовый отдел',
                    'route' => 'finance',
                ],
                [
                    'title' => 'Для клиентов',
                    'route' => 'clients',
                ],
            ]);
        });
    }
}
