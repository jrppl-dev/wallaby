<?php

namespace App\Containers\AppSection\Logger;

use App\Containers\AppSection\Logger\Models\LoggerLog;

class LoggerFacade
{
    public function request(\Illuminate\Http\Request $request)
    {
        return new Request($request);
    }

    public function entry(LoggerLog $log)
    {
        return new Entry($log);
    }
}
