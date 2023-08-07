<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\HasApiResponses;
use Exception;

class UserController extends Controller
{
    use HasApiResponses;

    public function __construct(protected UserService $userService)
    {
        //
    }

    public function index()
    {
        try {
            $users = $this->userService->index();

            return $this->success(data: $users);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = $this->userService->store(data: $request->validated());

            return $this->success(data: $user);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function show(User $user)
    {
        return $this->success(data: $user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user = $this->userService->update(user: $user, data: $request->validated());

            return $this->success(data: $user);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->userService->delete(user: $user);

            return $this->success(message: 'Post was deleted successfully.');
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }
}
