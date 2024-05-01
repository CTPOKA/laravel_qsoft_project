<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable;

class ArticleCreatedEvent extends AbstractArticleActionEvent
{
    use Dispatchable;
}
