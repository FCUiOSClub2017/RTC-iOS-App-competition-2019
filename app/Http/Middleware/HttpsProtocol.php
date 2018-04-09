<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset($_SERVER['HTTP_CF_VISITOR'])) {
            if (json_decode($_SERVER['HTTP_CF_VISITOR'])->scheme != "https" && env('APP_ENV') !== 'debug' && env('APP_ENV') !== 'locals') {
                return redirect()->secure($request->getRequestUri());
            }
        }
        elseif (!$request->isSecure() && (env('APP_ENV') !== 'debug' && env('APP_ENV') !== 'locals')) {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);     
    }
}
