<?php

namespace App\Services;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Services\StatisticsCommandServiceContract;
use Illuminate\Support\Collection;

class StatisticsCommandService implements StatisticsCommandServiceContract
{
    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly CarsRepositoryContract $carsRepository,
        private readonly TagsRepositoryContract $tagsRepository,
    ) {  
    }

    public function generalStatistics(): Collection
    {
        $articlesCount = $this->tagsRepository->articlesCount();

        return collect([
            [ 'Общее количество машин', $this->carsRepository->count()],
            [ 'Общее количество новостей', $this->articlesRepository->count()],
            [
                'Тег, у которого больше всего новостей на сайте',
                $articlesCount->first()->name
            ],
            [
                'Тег, у которого меньше всего новостей на сайте',
                $articlesCount->last()->name
            ],
            [
                'Средние количество новостей у тега',
                $articlesCount->avg('articles_count')
            ],
        ]);
    }

    public function articlesLenghtStatistics(): Collection
    {
        return collect([
            [
                'Самая длинная новость',
                ($article = $this->articlesRepository->getLongestArticle())->title,
                $article->id,
                $article->body_length
            ],
            [
                'Самая короткая новость',
                ($article = $this->articlesRepository->getShortestArticle())->title,
                $article->id,
                $article->body_length
            ],
        ]);
    }

    public function mostTaggableArticle(): Collection
    {
        $article = $this->articlesRepository->getMostTaggableArticle();

        return collect([
            [
                'Самая тегированная новость',
                $article->title,
                $article->id,
                $article->tags_count,
            ]
        ]);
    }
}