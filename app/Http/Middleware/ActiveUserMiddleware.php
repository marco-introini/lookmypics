<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;

class ActiveUserMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        $user = auth()->user();
        if (is_null($user)
            || !$user->isActive()) {
            abort(401);
        }

        return $next($request);
    }
}
