<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

class AppRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::middleware('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Daftarkan alias middleware
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
    }
}
