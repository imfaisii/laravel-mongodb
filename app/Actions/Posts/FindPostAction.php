<?php

namespace App\Actions\Posts;

use App\Common\AbstractFindAction;
use App\Models\Post;

class FindPostAction extends AbstractFindAction
{
    protected string $modelClass = Post::class;
}
