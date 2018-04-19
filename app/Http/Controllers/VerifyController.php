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
        if (request()->user()->verify) {
            return redirect()->route('home');
        }

        return view('auth.verify.notice');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function process($token)
    {
        $verify = UserVerify::where('token', $token)->get()->first();
        if (!$verify) {
            abort(404);
        }
        $user = $verify->user;
        $user->verify = true;
        $user->save();
        auth()->login($user);
        $verify->delete();

        return redirect()->route('verify.success');
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function resendEmail()
    {
        $user = auth()->user();
        $verify = new UserVerify([
            'token'=> str_random(40),
        ]);
        $user->verify()->save($verify);
        $user->sendVerifyEmailNotification($verify->token);

        return back();
    }
}
