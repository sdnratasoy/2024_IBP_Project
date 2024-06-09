<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RoleMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(App\Http\Middleware\RoleMiddleware::class, function ($app) {
            return new App\Http\Middleware\RoleMiddleware();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
