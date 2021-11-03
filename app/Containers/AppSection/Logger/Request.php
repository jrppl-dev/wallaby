<?php

namespace App\Containers\AppSection\Logger;

use App\Containers\AppSection\Logger\Models\LoggerLog;

class Request
{
    public function log()
    {
        return LoggerLog::create([
            'client_ip' => request()->ip(),
            'client_port' => request()->getPort(),
            'request_verb' => request()->method(),
            'request_url' => request()->url(),
            'request_params' => json_encode(request()->input()),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
