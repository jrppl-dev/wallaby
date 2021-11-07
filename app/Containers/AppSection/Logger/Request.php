<?php

namespace App\Containers\AppSection\Logger;

use App\Containers\AppSection\Logger\Models\LoggerLog;

class Request
{
    private \Illuminate\Http\Request $request;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }

    public function log()
    {
        return LoggerLog::create([
            'client_ip' => $this->request->ip(),
            'client_port' => $this->request->getPort(),
            'request_verb' => $this->request->method(),
            'request_url' => $this->request->url(),
            'request_params' => json_encode($this->request->input()),
            'user_agent' => $this->request->userAgent(),
        ]);
    }
}
