<?php

namespace App\Http\Controllers\Admin;

use Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamListController extends Controller
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
        $this->middleware('can.review.all.file');
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamlist(){
        dd(Role::whereName('participant')->get());
        return Role::whereName('participant');
    }
}
