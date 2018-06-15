<?php

namespace App\Http\Middleware;

use Closure;

class IsInvigilator
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->hasRole('developer')) {
            return $next($request);
        }

        if ($request->user()->hasRole('invigilator')) {
            return $next($request);
        }

        return back();
    }
}
