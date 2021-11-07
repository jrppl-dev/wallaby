<?php

namespace App\Containers\AppSection\Logger\Providers;

use App\Containers\AppSection\Logger\Middlewares\LogRequestMiddleware;
use App\Ship\Parents\Providers\MiddlewareProvider;
use Illuminate\Auth\Middleware\Authorize;

class MiddlewareServiceProvider extends MiddlewareProvider
{
    protected array $middlewares = [
        // ..
    ];

    protected array $middlewareGroups = [
        'web' => [

        ],
        'api' => [
            LogRequestMiddleware::class
        ],
    ];

    protected array $routeMiddleware = [
        // Laravel default route middleware's:
        'can' => Authorize::class,
    ];
}
