<?php

namespace App\Containers\AppSection\Logger\Models;

use App\Ship\Parents\Models\Model;

class LoggerLog extends Model
{

    protected $fillable = [
        'client_ip',
        'client_port',
        'request_verb',
        'request_url',
        'request_params',
        'user_agent',
        'response_processing_time',
        'response_data',
    ];

}
