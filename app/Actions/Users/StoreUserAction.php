<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Common\AbstractCreateAction;

class StoreUserAction extends AbstractCreateAction
{
    protected string $modelClass = User::class;

    public function create(array $data): User
    {
        /** @var User $user */
        $user = parent::create($data);

        // TODO: ROLES AND PERMISSIONS
        // $user->syncRoles($data['roles']);

        return $user;
    }
}
