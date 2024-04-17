<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['panels.left_information_menu' , 'panels.footer_information_menu'], function (\Illuminate\View\View $view) {
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
