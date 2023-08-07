<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\HasApiResponses;
use Exception;

class PostController extends Controller
{
    use HasApiResponses;

    public function __construct(protected PostService $postService)
    {
        //
    }
    public function index()
    {
        try {
            $posts = $this->postService->index();

            return $this->success(data: $posts);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function store(StorePostRequest $request)
    {
        try {
            $post = $this->postService->store(data: $request->validated());

            return $this->success(data: $post);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function show(Post $post)
    {
        return $this->success(data: $post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post = $this->postService->update(post: $post, data: $request->validated());

            return $this->success(data: $post);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function destroy(Post $post)
    {
        try {
            $this->postService->delete(post: $post);

            return $this->success(message: 'Post was deleted successfully.');
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }
}
