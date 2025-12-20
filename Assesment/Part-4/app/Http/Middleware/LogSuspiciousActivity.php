<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LogSuspiciousActivity
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Track failed authentication attempts
        if ($response->status() === 401 || $response->status() === 403) {
            $key = 'failed_attempts:' . $request->ip();
            $attempts = Cache::get($key, 0) + 1;
            Cache::put($key, $attempts, 3600); // 1 hour
            
            if ($attempts >= 5) {
                Log::alert('Suspicious API activity detected', [
                    'ip' => $request->ip(),
                    'failed_attempts' => $attempts,
                    'endpoint' => $request->path(),
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()
                ]);
            }
        }
        
        // Log unusual access patterns
        if ($request->user()) {
            $userKey = 'api_requests:' . $request->user()->id;
            $requests = Cache::get($userKey, 0) + 1;
            Cache::put($userKey, $requests, 300); // 5 minutes
            
            if ($requests > 100) { // More than 100 requests in 5 minutes
                Log::warning('High API usage detected', [
                    'student_id' => $request->user()->id,
                    'requests_count' => $requests,
                    'ip' => $request->ip()
                ]);
            }
        }
        
        return $response;
    }
}