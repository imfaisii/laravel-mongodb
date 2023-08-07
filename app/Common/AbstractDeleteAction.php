<?php

namespace App\Common;

use App\Common\NewQueryTrait;

abstract class AbstractDeleteAction
{
    use NewQueryTrait;

    /**
     * @param BaseModel $model
     * @return bool|null
     */
    public function delete(BaseModel $model): ?bool
    {
        return $model->delete();
    }

    /**
     * @param  BaseModel  $model
     * @return bool|null
     */
    public function force(BaseModel $model): ?bool
    {
        return $model->forceDelete();
    }
}
