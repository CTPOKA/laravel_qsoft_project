<?php

namespace App\Providers;

use App\Contracts\Services\ArticleCreationServiceContract;
use App\Contracts\Services\ArticleRemoveServiceContract;
use App\Contracts\Services\ArticleUpdateServiceContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoveServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Contracts\Services\CatalogDataCollectorContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\Contracts\Services\StatisticsCommandServiceContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Services\ArticlesService;
use App\Services\CarsService;
use App\Services\CatalogDataCollector;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\SalonsClientService;
use App\Services\StatisticsCommandService;
use App\Services\TagsSyncService;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use QSchool\FakerImageProvider\FakerImageProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locate', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });

        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(FlashMessage::class, fn () => new FlashMessage(session()));

        $this->app->singleton(CatalogDataCollectorContract::class, CatalogDataCollector::class);
        $this->app->singleton(TagsSyncServiceContract::class, TagsSyncService::class);

        $this->app->singleton(CarCreationServiceContract::class, CarsService::class);
        $this->app->singleton(CarUpdateServiceContract::class, CarsService::class);
        $this->app->singleton(CarRemoveServiceContract::class, CarsService::class);

        $this->app->singleton(ArticleCreationServiceContract::class, ArticlesService::class);
        $this->app->singleton(ArticleUpdateServiceContract::class, ArticlesService::class);
        $this->app->singleton(ArticleRemoveServiceContract::class, ArticlesService::class);

        $this->app->singleton(StatisticsCommandServiceContract::class, StatisticsCommandService::class);

        $this->app->singleton(ImagesServiceContract::class, function () {
            /** @var Illuminate\Filesystem\FilesystemAdapter $disk */
            $disk = Storage::disk('public');
            return $this->app->make(ImagesService::class, ['disk' => $disk]);
        });

        $this->app->singleton(SalonsClientServiceContract::class, function () {
            return $this->app->make(SalonsClientService::class, [
                'user' => config('auth.basic.user'),
                'password' => config('auth.basic.password'),
                'baseUrl' => config('services.salonApi.url'),
            ]);
        });
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
