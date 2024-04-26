<?php

namespace App\Services;

use App\Contracts\Services\ArticleCreationServiceContract;
use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\ArticleRemoveServiceContract;
use App\Contracts\Services\ArticleUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSyncServiceContract;
use App\Models\Article;

class ArticlesService implements ArticleCreationServiceContract, ArticleUpdateServiceContract, ArticleRemoveServiceContract
{
    public function __construct(
        private readonly ArticlesRepositoryContract $articlesRepository,
        private readonly TagsSyncServiceContract $tagsSync,
        private readonly ImagesServiceContract $imagesService,
    ) {
    }

    public function create(array $fields, ?array $tags = null): Article
    {
        $fields['published_at'] = $fields['published'] ? now() : null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $Article = $this->articlesRepository->create($fields);

        if ($tags !== null) {
            $this->tagsSync->sync($Article, $tags);
        }

        $this->articlesRepository->flashCache();
        
        return $Article;
    }

    public function update(int $id, array $fields, ?array $tags = null): Article
    {
        $article = $this->articlesRepository->getById($id);
        $oldImageId = null;

        $published = $fields['published'];
        if (is_null($article->published_at) && $published) {
            $fields['published_at'] = now();
        } elseif (! is_null($article->published_at) && ! $published) {
            $fields['published_at'] = null;
        }

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $article->image_id;
        }

        $this->articlesRepository->update($article, $fields);

        if ($tags !== null) {
            $this->tagsSync->sync($article, $tags);
        }

        if ($oldImageId !== null) {
            $this->imagesService->deleteImage($oldImageId);
        }

        $this->articlesRepository->flashCache();

        return $article;
    }

    public function delete(int $id)
    {
        $article = $this->articlesRepository->getById($id);

        if (! empty($article->image_id)) {
            $this->imagesService->deleteImage($article->image_id);
        }

        $this->articlesRepository->delete($id);

        $this->articlesRepository->flashCache();
    }
}