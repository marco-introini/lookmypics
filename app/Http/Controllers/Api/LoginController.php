<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;

class LoginController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['OK']);
    }
}
