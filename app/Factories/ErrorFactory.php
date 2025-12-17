<?php

declare(strict_types=1);

namespace App\Factories;

use Illuminate\Http\JsonResponse;
use Throwable;

final class ErrorFactory
{
    public static function create(Throwable $exception, $request): JsonResponse
    {
        $status = $exception->getCode() ?: 500;
        $apiError = [
            'title' => 'An error occurred',
            'detail' => $exception->getMessage(),
            'instance' => $request->url(),
            'status' => $status,
            'type' => 'https://example.com/docs/errors/' . $status
        ];

        return response()->json($apiError, $status);
    }
}
