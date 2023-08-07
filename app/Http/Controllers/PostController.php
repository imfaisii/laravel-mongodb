<?php

namespace App\Http\Controllers;

use App\Actions\Posts\DeletePostAction;
use App\Actions\Posts\FindPostAction;
use App\Actions\Posts\ListPostAction;
use App\Actions\Posts\StorePostAction;
use App\Common\BaseJsonResource;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

use function App\Helpers\null_resource;

class PostController extends Controller
{
    public function index(ListPostAction $action): JsonResource
    {
        $action->enableQueryBuilder();

        return $action->resourceCollection($action->listOrPaginate());
    }

    public function store(StorePostRequest $request, StorePostAction $action): JsonResource
    {
        $user = $action->create($request->validated());

        return $action->individualResource($user);
    }

    public function show(string $id, FindPostAction $action): BaseJsonResource
    {
        $action->enableQueryBuilder();

        return $action->individualResource($action->findOrFail($id));
    }

    public function destroy(Post $post, DeletePostAction $action): BaseJsonResource
    {
        $action->delete($post);

        return null_resource();
    }
}
