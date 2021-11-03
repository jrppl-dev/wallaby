<?php

namespace App\Containers\AppSection\Logger\Providers;

use App\Containers\AppSection\Logger\Facades\Logger;
use App\Containers\AppSection\Logger\LoggerFacade;
use App\Ship\Parents\Providers\MainProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends MainProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        'Logger' => Logger::class
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();
        \App::bind('test', function () {
            return new LoggerFacade();
        });
    }
}
