<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Role;
use Permission;

class HomeController extends Controller
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
        $this->middleware('is.developer')->only('test');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_role()
    {
        dump(request()->user());
        dump(request()->user()->getAllPermissions());
        return "";
    }
    /**
     * test the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return auth()->user()->name;
    }
}
