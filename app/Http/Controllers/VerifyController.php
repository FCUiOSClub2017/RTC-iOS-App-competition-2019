<?php

namespace App\Http\Controllers;

use App\UserVerify;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['process']);
        $this->middleware('is.verify')->only('success');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function notice()
    {
        if(request()->user()->verify)
            return redirect(route('home', [], false));
        return view('auth.verify.notice');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function process($token)
    {
        $verify = UserVerify::whereToken($token)->first();
        if(!$verify)
            abort(404);
        $user = $verify->user;
        $user->verify = true;
        $user->save();
        auth()->login($user);
        $verify->delete();
        return redirect(route('verify.success', [], false));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('auth.verify.success');
    }
}
