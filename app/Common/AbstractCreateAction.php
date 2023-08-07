<?php

namespace App\Common;

use App\Common\BaseModel;
use App\Common\NewQueryTrait;
use App\Traits\HasApiResource;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractCreateAction
{
    use NewQueryTrait;
    use HasApiResource;

    /**
     * @param array $data
     * @return BaseModel|Collection
     */
    public function create(array $data): BaseModel|Collection
    {
        return $this->newQuery()->create($data);
    }
}
