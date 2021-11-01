<?php

/**
 * @apiGroup           City
 * @apiName            deleteUser
 * @api                {delete} /v1/users/:id Delete City
 * @apiDescription     Delete users of any type (Admin, Client...)
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated City
 *
 * @apiSuccessExample  {json}       Success-Response:
 * HTTP/1.1 202 OK
 * {
 * "message": "City (4) Deleted Successfully."
 * }
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('users/{id}', [Controller::class, 'deleteUser'])
    ->name('api_user_delete_user')
    ->middleware(['auth:api']);
