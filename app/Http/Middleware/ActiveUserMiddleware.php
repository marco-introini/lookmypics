<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;

class ActiveUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (is_null($user)
            || ($user->email_verified_at === null)
            || ($user->role != UserRole::USER)) {
            abort(401);
        }

        return $next($request);
    }
}
