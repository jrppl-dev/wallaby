<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\GetAllUsersAction;
use App\Containers\AppSection\User\Actions\GetAuthenticatedUserAction;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUsersRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAuthenticatedUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserPrivateProfileTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function getAllUsers(GetAllUsersRequest $request): array
    {
        $users = app(GetAllUsersAction::class)->run();
        return $this->transform($users, UserTransformer::class);
    }

    public function getAuthenticatedUser(GetAuthenticatedUserRequest $request): array
    {
        $user = app(GetAuthenticatedUserAction::class)->run();
        return $this->transform($user, UserPrivateProfileTransformer::class);
    }

}
