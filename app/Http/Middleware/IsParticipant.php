<?php

namespace App\Http\Middleware;

use Closure;

class IsParticipant
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

        if ($request->user()->hasRole('participant')) {
            return $next($request);
        }

        return back();
    }
}
