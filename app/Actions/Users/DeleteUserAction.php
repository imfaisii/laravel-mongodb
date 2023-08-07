<?php

namespace App\Actions\Users;

use App\Common\AbstractDeleteAction;
use App\Models\User;

class DeleteUserAction extends AbstractDeleteAction
{
    protected string $modelClass = User::class;
}
