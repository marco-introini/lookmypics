<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

abstract class BaseAPIController extends Controller
{
    public function ok(string $message, array $data)
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ])->setStatusCode(200);
    }

    public function error(string $message, int $code = 401)
    {
        return response()->json([
            'message' => $message
        ])->setStatusCode($code);
    }
}
