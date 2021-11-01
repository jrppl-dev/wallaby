<?php

namespace App\Containers\AppSection\Authentication\Providers;

use App\Ship\Middlewares\Http\RedirectIfAuthenticated;
use App\Ship\Parents\Providers\MiddlewareProvider;

class MiddlewareServiceProvider extends MiddlewareProvider
{
    protected array $middlewares = [
        // ..
    ];

    protected array $middlewareGroups = [
        'web' => [
            // ..
        ],
        'api' => [
            // ..
        ],
    ];

    protected array $routeMiddleware = [
        // apiato City Authentication middleware for Web Pages
        'guest' => RedirectIfAuthenticated::class
    ];
}
