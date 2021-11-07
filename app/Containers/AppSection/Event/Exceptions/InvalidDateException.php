<?php

namespace App\Containers\AppSection\Event\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class InvalidDateException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'The date is not valid.';
}
