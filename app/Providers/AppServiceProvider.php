<?php

namespace App\Providers;

use App\Contracts\Repositories\CarCreationServiceContract;
use App\Contracts\Repositories\CarUpdateServiceContract;
use App\Contracts\Services\CatalogDataCollectorContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Services\CarsService;
use App\Services\CatalogDataCollector;
use App\Services\FlashMessage;
use App\Services\TagsSyncService;
use Illuminate\Support\Facades\Blade;
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

        $this->app->singleton(CatalogDataCollectorContract::class, CatalogDataCollector::class);
        $this->app->singleton(TagsSyncServiceContract::class, TagsSyncService::class);

        $this->app->singleton(CarCreationServiceContract::class, CarsService::class);
        $this->app->singleton(CarUpdateServiceContract::class, CarsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', fn ()=> true);
        Blade::if('authorized', fn ()=> true);
    }
}
