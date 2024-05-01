<?php

use App\Models\Article;
use App\Models\Car;
use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail, ?Category $category = null) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));

    if ($category) {
        if ($category->parent_id) {
            $parentCategory = $category->ancestors->keyBy('id')->first();
            $trail->push($parentCategory->name, route('catalog', $parentCategory));
        }
        $trail->push($category->name, route('catalog', $category));
    }
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, Car $product) {
    $trail->parent('catalog');
    $trail->push($product->name, route('products', $product));
});

Breadcrumbs::for('articles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('articles'));
});

Breadcrumbs::for('article', function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('articles');
    $trail->push($article->title, route('article', $article));
});

Breadcrumbs::for('inner', function (BreadcrumbTrail $trail, string $title) {
    $trail->parent('home');
    $trail->push($title);
});
