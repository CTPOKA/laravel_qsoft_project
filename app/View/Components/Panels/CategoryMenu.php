<?php

namespace App\View\Components\Panels;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    private ?Category $currentCategory;

    public function __construct(public readonly CategoriesRepositoryContract $repository)
    {
        $categorySlug = Route::current()->slug;
        $this->currentCategory = $categorySlug ? $this->repository->findBySlug($categorySlug, ['ancestors']) : null;
    }

    public function render(): View|Closure|string
    {
        $categories = $this->repository->getTree();
        
        return view('components.panels.category-menu', ['categories' => $categories]);
    }

    public function selectedCategory(?Category $category = null): bool
    {
        if (! Route::is('catalog')) {
            return false;
        }

        if ($category === null || $this->currentCategory === null) {
            return $this->currentCategory === $category;
        }

        return $this->currentCategory->id === $category->id
            || $this->currentCategory->ancestors->keyBy('id')->has($category->id)
        ;
    }
}
