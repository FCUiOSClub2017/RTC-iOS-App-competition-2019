<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Setting;

class DeadlineOfRegister
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
        if (Carbon::parse(Setting::get('register_deadline', '2019-5-15'), 'Asia/Taipei')->lt(Carbon::now())) {
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
