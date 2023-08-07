<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function index(): Collection
    {
        $posts = auth()->user()->posts()->get();

        return $posts;
    }

    public function store(array $data): Post
    {
        return auth()->user()->posts()->create($data);
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);

        return $post;
    }

    public function delete(Post $post): array
    {
        $post->delete();

        return [];
    }
}
