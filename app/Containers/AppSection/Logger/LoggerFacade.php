<?php

namespace App\Containers\AppSection\Logger;

use App\Containers\AppSection\Logger\Models\LoggerLog;

class LoggerFacade
{
    public function request()
    {
        return new Request();
    }

    public function entry(LoggerLog $log)
    {
        return new Entry($log);
    }
}
