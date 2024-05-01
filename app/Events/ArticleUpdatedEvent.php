<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ArticleUpdatedEvent extends AbstractArticleActionEvent
{
    use Dispatchable;
}
