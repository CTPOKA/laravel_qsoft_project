<?php

namespace App\Contracts\Services;

use App\Contracts\HasTagsContract;

interface TagsSyncServiceContract
{
    public function sync(HasTagsContract $model, array $tags);
}