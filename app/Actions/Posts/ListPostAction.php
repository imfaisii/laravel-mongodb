<?php

namespace App\Actions\Posts;

use App\Common\AbstractListAction;
use App\Models\Post;

class ListPostAction extends AbstractListAction
{
    protected string $modelClass = Post::class;
}
