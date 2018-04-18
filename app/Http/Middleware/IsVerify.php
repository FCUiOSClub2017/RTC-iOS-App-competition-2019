<?php

namespace App\Http\Middleware;

use Closure;

class IsVerify
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
        if($request->user()->verify)
            return $next($request);
        return redirect()->route('verify.notice');
    }
}
