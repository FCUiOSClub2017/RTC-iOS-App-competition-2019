<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.verify');
    }

    /**
     * show change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    /**
     * change user password.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current-password' => 'required|string|min:10',
            'new-password'     => 'required|string|min:10|confirmed',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully !');
    }
}
