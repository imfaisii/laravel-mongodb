<?php

namespace App\Common;

use App\Traits\HasApiResource;
use App\Common\NewQueryTrait;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AbstractUpdateAction
{
    use NewQueryTrait;
    use HasApiResource;

    /**
     * @param BaseModel|Role|Permission $model
     * @param array $data
     * @return BaseModel|Role|Permission
     */
    public function update(BaseModel $model, array $data): BaseModel
    {
        return tap($model, function (BaseModel $model) use ($data) {
            $model->update($data);
        });
    }
}
