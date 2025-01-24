<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

abstract class BaseAPIController extends Controller
{
    /**
     * @param  array<string|null>  $data
     */
    public function ok(string $message, array $data): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ])->setStatusCode(200);
    }

    public function error(string $message, int $code = 401): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ])->setStatusCode($code);
    }
}
