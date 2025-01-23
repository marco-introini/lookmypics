<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseAPIController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return $this->error("Wrong credentials", 401);
        }

        $user = User::firstWhere('email', $request->email);

        return $this->ok("Login OK", [
            'token' => $user
                ?->createToken('API token for '.$user->email)
                ?->plainTextToken
        ]);
    }
}
