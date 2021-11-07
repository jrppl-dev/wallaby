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

    public function response($response_processing_time, array $data = [])
    {
        return $this->log->update([
            'response_processing_time' => $response_processing_time,
            'response_data' => json_encode($data)
        ]);
    }
}
