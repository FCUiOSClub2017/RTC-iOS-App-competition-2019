<?php

namespace App\Http\Middleware;

use Closure;

class CanReviewAllFile
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
        if($request->user()->hasAnyPermission(['review all file']))
            return $next($request);
        return back();
    }
}
