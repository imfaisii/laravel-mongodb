<?php

namespace App\Actions\Posts;

use App\Common\AbstractDeleteAction;
use App\Models\Post;

class DeletePostAction extends AbstractDeleteAction
{
    protected string $modelClass = Post::class;
}
