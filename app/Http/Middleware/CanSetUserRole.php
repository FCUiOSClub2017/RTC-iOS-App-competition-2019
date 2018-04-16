<?php

namespace App\Http\Middleware;

use Closure;

class CanSetUserRole
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
        if($request->user()->hasAnyPermission(['set user role']))
            return $next($request);
        return back();
    }
}
