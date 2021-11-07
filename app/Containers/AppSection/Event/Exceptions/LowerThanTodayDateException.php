<?php

namespace App\Containers\AppSection\Event\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class LowerThanTodayDateException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'The date provided can not be inferior than today.';
}
