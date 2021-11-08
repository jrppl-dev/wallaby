<?php

use App\Containers\AppSection\Welcome\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Wallaby API Documentation",
 *      description="Swagger API Documentation",
 *      @OA\Contact(
 *          email="jrppl.dev@gmail.com"
 *      ),
 *      @OA\License(
 *          name="The MIT License (MIT)",
 *          url="https://opensource.org/licenses/MIT"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 */

Route::get('/', [Controller::class, 'apiRoot'])
    ->name('api_welcome_root_page');
