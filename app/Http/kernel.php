<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware global (dijalankan di semua request).
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [

            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware (bisa dipanggil per route).
     */
    protected $routeMiddleware = [

        'verified'   => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
         'administrator' => \App\Http\Middleware\CheckAdministrator::class,
            #'admin' => \App\Http\Middleware\CheckAdmin::class,
    ];
}
