<?php

/**
 * @apiGroup           Event
 * @apiName            getAllEvents
 * @api                {get} /v1/events Get All Events
 * @apiDescription     Get All Application Events.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  term (optional)
 * @apiParam           {Date}  date (optional), format `YYYY-MM-DD`
 *
 * @apiUse             EventSuccessMultipleResponse
 */

use App\Containers\AppSection\Event\UI\API\Controllers\Controller;
use App\Containers\AppSection\Logger\Middlewares\LogRequestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('events', [Controller::class, 'getAllEvents'])
    ->name('api_event_get_all_events')
    ->middleware(['auth:api', LogRequestMiddleware::class]);
