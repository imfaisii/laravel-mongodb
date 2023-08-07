<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\HasApiResponses;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    use HasApiResponses;

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();

            $token = $request->user()->createToken('token-name')->plainTextToken;

            return $this->success(data: ['type' => 'bearer', 'token' => $token]);
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $request->user()->tokens()->delete();

            return $this->success(message: "User logged out successfully.");
        } catch (Exception $exception) {
            return $this->exception(exception: $exception);
        }
    }
}
