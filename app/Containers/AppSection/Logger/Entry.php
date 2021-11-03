<?php

namespace App\Containers\AppSection\Logger;

use App\Containers\AppSection\Logger\Models\LoggerLog;

class Entry
{
    private LoggerLog $log;

    public function __construct(LoggerLog $log)
    {
        $this->log = $log;
    }

    public function response(array $data = [])
    {
        return $this->log->update([
            'response_processing_time' => microtime(true) - LARAVEL_START,
            'response_data' => json_encode($data)
        ]);
    }
}
