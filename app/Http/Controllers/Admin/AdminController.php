<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Setting;

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
    public function index()
    {
        return view('admin.index');
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function deadlineOfRegister()
    {
        Setting::set();
        return view('admin.index');
    }
}
