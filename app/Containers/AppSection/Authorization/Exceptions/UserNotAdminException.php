<?php

namespace App\Containers\AppSection\Authorization\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class UserNotAdminException extends Exception
{
    protected $code = Response::HTTP_FORBIDDEN;
    protected $message = 'This City does not have an Admin permission.';
}
