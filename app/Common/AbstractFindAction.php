<?php

namespace App\Common;

use App\Common\NewQueryTrait;
use App\Traits\HasApiResource;

abstract class AbstractFindAction
{
    use NewQueryTrait;
    use HasApiResource;

    /**
     * @param $primaryKey
     * @param array|string[] $columns
     * @return BaseModel|null
     */
    public function find($primaryKey, array $columns = ['*']): ?BaseModel
    {
        return $this->getQuery()->find($primaryKey, $columns);
    }

    /**
     * @param $primaryKey
     * @param array|string[] $columns
     * @return BaseModel
     */
    public function findOrFail($primaryKey, array $columns = ['*']): BaseModel
    {
        return $this->getQuery()->findOrFail($primaryKey, $columns);
    }

    /**
     * @param $primaryKey
     * @param array|string[] $columns
     * @return BaseModel
     */
    public function findOrNew($primaryKey, array $columns = ['*']): BaseModel
    {
        return $this->getQuery()->findOrNew($primaryKey, $columns);
    }

    /**
     * @param BaseModel $model
     * @return BaseModel
     */
    public function findByModel(BaseModel $model): BaseModel
    {
        return $model->applyQueryBuilder();
    }
}
