<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\CreateTokenAction;
use App\Actions\Users\FindUserAction;
use App\Common\BaseJsonResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use function App\Helpers\null_resource;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, CreateTokenAction $action): JsonResponse
    {
        $request->authenticate();

        if (!auth()->attempt($request->validated())) {
            return response()->json(['data' => null, 'status' => 'error', 'message' => 'Invalid credentials.']);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'type' => 'bearer',
                'token' => $action->run(user: $request->user())
            ]
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): BaseJsonResource
    {
        $request->user()->tokens()->delete();

        return null_resource();
    }

    public function getProfile(FindUserAction $action)
    {
        $action->enableQueryBuilder();

        return $action->individualResource($action->findOrFail(auth()->id()));
    }
}
