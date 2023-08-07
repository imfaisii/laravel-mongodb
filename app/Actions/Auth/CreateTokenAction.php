<?php

namespace App\Actions\Auth;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateTokenAction
{
    use AsAction;

    public function handle(User $user)
    {
        return $user->createToken('auth-token')->plainTextToken;
    }
}
