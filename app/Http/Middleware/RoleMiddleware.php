<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        Log::info('🔍 RoleMiddleware triggered', [
            'user' => $user,
            'roles' => $roles
        ]);

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if (!in_array($user->role, $roles)) {
            return response()->json(['message' => 'Forbidden - Role access denied'], 403);
        }

        return $next($request);
    }
}
