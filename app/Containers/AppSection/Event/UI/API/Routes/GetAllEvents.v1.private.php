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

/**
 * @OA\Schema(
 *     schema="EventResource",
 *     type="object",
 *     @OA\Property(
 *        property="object",
 *        type="string"
 *     ),
 *     @OA\Property(
 *        property="id",
 *        type="string"
 *     ),
 *     @OA\Property(
 *        property="name",
 *        type="string"
 *     ),
 *      @OA\Property(
 *        property="city",
 *        type="string"
 *     ),
 *      @OA\Property(
 *        property="country",
 *        type="string"
 *     ),
 *      @OA\Property(
 *        property="start_date",
 *        type="string"
 *     ),
 *      @OA\Property(
 *        property="end_date",
 *        type="string"
 *     )
 * )
 */
/**
 * @OA\Get(
 *      path="/events",
 *      operationId="getAllEvents",
 *      tags={"Events"},
 *      summary="Get list of events",
 *      description="Returns list of events",
 *      @OA\Parameter(
 *          name="term",
 *          description="Term to search for city and/or country",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="date",
 *          description="Date format should be (YYYY-MM-DD)",
 *          required=false,
 *          in="query",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/EventResource")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *      @OA\Response(
 *          response=403,
 *          description="Forbidden"
 *      ),
 *     security={
 *       {"auth:api": {"list-events"}}
 *     }
 *     )
 */
use App\Containers\AppSection\Event\UI\API\Controllers\Controller;
use App\Containers\AppSection\Logger\Middlewares\LogRequestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('events', [Controller::class, 'getAllEvents'])
    ->name('api_event_get_all_events')
    ->middleware(['auth:api', LogRequestMiddleware::class]);
