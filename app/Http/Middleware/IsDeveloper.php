<?php

namespace App\Http\Middleware;

use Closure;

class IsDeveloper
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
        if ($request->user()->hasAnyPermission(['set admin', 'set user role', 'upload file', 'review all file', 'edit teammate'])) {
            return $next($request);
        }

        return back();
    }
}
