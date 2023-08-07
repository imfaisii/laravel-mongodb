<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function index(): Collection
    {
        $users = User::all();

        return $users;
    }

    public function store(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function delete(User $user): array
    {
        $user->delete();

        return [];
    }
}
