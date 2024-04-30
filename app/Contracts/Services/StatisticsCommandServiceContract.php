<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface StatisticsCommandServiceContract
{
    public function generalStatistics(): Collection;

    public function articlesLenghtStatistics(): Collection;

    public function mostTaggableArticle(): Collection;
}