<?php

namespace App\Containers\AppSection\Logger\Middlewares;

use App\Containers\AppSection\Logger\Facades\Logger;
use App\Containers\AppSection\Logger\Models\LoggerLog;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Http\Request;

class LogRequestMiddleware extends Middleware
{
    /**
     * @var LoggerLog
     */
    private LoggerLog $log;

    public function handle(Request $request, Closure $next)
    {
        $log = Logger::request($request)->log();

        cache([
            'api.last.request.log_id' => $log->id,
        ]);
        /** @var \Illuminate\Http\JsonResponse $response */
        $response = $next($request);
        $json = json_decode($response->content());
        cache([
            'api.last.request.results' => $json?->meta?->pagination?->total ?? 0,
        ]);
        return $response;
    }

    public function terminate($request, $response)
    {
        $response_time = app()->runningUnitTests() ? null : microtime(true) - LARAVEL_START;
        $log_id = cache('api.last.request.log_id', null);
        if ($log_id !== null) {
            $log = LoggerLog::find($log_id);
            Logger::entry($log)->response($response_time, ['results' => cache('api.last.request.results', 0)]);
        }

        return ($response);
    }
}
