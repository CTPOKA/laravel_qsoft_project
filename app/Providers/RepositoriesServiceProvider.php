<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Repositories\CarBodiesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Repositories\RolesRepositoryContract;
use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\BannersRepository;
use App\Repositories\BasketsRepository;
use App\Repositories\CarBodiesRepository;
use App\Repositories\CarClassesRepository;
use App\Repositories\CarEnginesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\RolesRepository;
use App\Repositories\SalonsRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(CarEnginesRepositoryContract::class, CarEnginesRepository::class);
        $this->app->singleton(CarBodiesRepositoryContract::class, CarBodiesRepository::class);
        $this->app->singleton(CarClassesRepositoryContract::class, CarClassesRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
        $this->app->singleton(BannersRepositoryContract::class, BannersRepository::class);
        $this->app->singleton(SalonsRepositoryContract::class, SalonsRepository::class);
        $this->app->singleton(RolesRepositoryContract::class, RolesRepository::class);
        $this->app->singleton(BasketsRepositoryContract::class, BasketsRepository::class);
        $this->app->singleton(OrdersRepositoryContract::class, OrdersRepository::class);
    }
    
    public function boot(): void
    {
        //
    }
}
