<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;

trait HasApiResponses
{
    public function success(mixed $data = null, string $message = 'success', int $statusCode = 200): JsonResponse
    {
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
    }

    public function error(string $message = 'error', int $statusCode = 400): JsonResponse
    {
        $response = [
            'status' => false,
            'message' => $message,
        ];

        return response()->json($response, $statusCode);
    }

    public function exception(Exception $exception = null, int $statusCode = 400): JsonResponse
    {
        $response = [
            'status' => false,
            'message' => $exception->errorInfo[2] ?? $exception->getMessage() ?? 'Exception occured.',
        ];

        return response()->json($response, $statusCode);
    }
}
