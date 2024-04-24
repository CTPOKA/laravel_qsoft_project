<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarBodiesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\CarBodiesRepository;
use App\Repositories\CarClassesRepository;
use App\Repositories\CarEnginesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoriesRepository;
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
    }
    
    public function boot(): void
    {
        //
    }
}
