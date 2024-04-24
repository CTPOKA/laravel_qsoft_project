<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\ArticlesPagesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PageController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about',    [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/sale',     [PageController::class, 'sale'])->name('sale');
Route::get('/finance',  [PageController::class, 'finance'])->name('finance');
Route::get('/clients',  [PageController::class, 'clients'])->name('clients');

Route::get('/articles',  [ArticlesPagesController::class, 'articles'])->name('articles');
Route::get('/articles/{article:slug}',  [ArticlesPagesController::class, 'article'])->name('article');

Route::prefix('admin')->name('admin.')->group(function (Router $router) {
    $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
    $router->resource('articles', ArticlesController::class)->except(['show']);
    $router->resource('cars', CarsController::class)->except(['show']);
});

Route::get('/catalog/{category?}',  [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{product}',  [CatalogController::class, 'products'])->name('products');

