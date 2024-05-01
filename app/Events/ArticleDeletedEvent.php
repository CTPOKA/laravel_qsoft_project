<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ArticleDeletedEvent extends AbstractArticleActionEvent
{
    use Dispatchable;
}
