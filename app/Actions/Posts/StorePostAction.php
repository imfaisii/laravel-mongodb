<?php

namespace App\Actions\Posts;

use App\Common\AbstractCreateAction;
use App\Models\Post;

class StorePostAction extends AbstractCreateAction
{
    protected string $modelClass = Post::class;

    public function create(array $data): Post
    {
        /** @var Post $post */
        return auth()->user()->posts()->create($data);
    }
}
