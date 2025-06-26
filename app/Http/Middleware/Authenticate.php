<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return null; // karena API, kita gak redirect ke halaman login
        }

        return null;
    }
}

