<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
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
        $this->middleware('is.participant')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // dd($user->team_member);
        
        return view('team.info',['team'=>$user->team_member]);
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        dump(request()->user());
        return view('team.edit');
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        dump(request()->user());
        dump(request()->input());
        return "";
    }
}
