<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance and set middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.verify');
        $this->middleware('is.admin');
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamlist()
    {
        $users = User::role('participant')->whereVerify(true)->get();

        return view('admin.teamlist')->with([
            'users' => $users,
        ]);
    }
}
