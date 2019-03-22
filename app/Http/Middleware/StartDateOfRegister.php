<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Setting;

class StartDateOfRegister
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
        if (!Carbon::parse(Setting::get('register_begin_date', '2019-4-01'), 'Asia/Taipei')->lt(Carbon::now())) {
            if (auth()->check()) {
                if (!auth()->user()->hasRole('developer')) {
                    return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
                }
            } else {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}

