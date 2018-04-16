<?php

namespace App\Http\Middleware;

use Closure;

class CanSetAdmin
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
        if($request->user()->hasAnyPermission(['set admin']))
            return $next($request);
        return back();
    }
}
