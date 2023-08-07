<?php

namespace App\Traits;

use App\Common\BaseJsonResource;
use App\Common\BaseModel;
use App\Common\BaseResourceCollection;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection as IlluminateSupportCollection;

/**
 * @property string $modelClass
 */
trait HasApiResource
{
    /**
     * @param Collection|Paginator $collection
     * @return ResourceCollection
     */
    public function resourceCollection(Paginator|Collection|IlluminateSupportCollection $collection): ResourceCollection
    {
        return new BaseResourceCollection($collection, $this->modelClass);
    }

    /**
     * @param \App\Common\BaseModel $model
     * @return JsonResource
     */
    public function individualResource(BaseModel $model): JsonResource
    {
        return new BaseJsonResource($model);
    }
}
