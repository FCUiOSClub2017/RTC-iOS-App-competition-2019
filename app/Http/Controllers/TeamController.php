<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TeamMember;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('is.verify');
        // $this->middleware('is.participant')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $teamMember = $user->team_member;
        if ($teamMember->count() == 0) {
            return redirect()->secure(route('team.edit',[],false));
        }
        return view('team.info',['team'=>$user->team_member]);
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($level=null)
    {
        if ($level) if( ((int)$level) >= 5) abort(404);
        $user = auth()->user();
        $teamMember = $user->team_member;
        if (!$level && $teamMember->count() != 0) {
            return back();
        }
        return view('team.edit',['level'=>$level]);
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($level=null)
    {
        dump(request()->user());
        dump(request()->input());
        return "";
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamData($level)
    {
        dump(request()->user());
        dump(request()->input());
        return "";
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function uniqueEmail()
    {
        $email = request()->email;
        $level = request()->level;
        if($level == "0" || $level == "4")
            return ['result' => true];
        if (!$email) {
            return [];
        }
        $userEmail = User::where('email',$email)->first();
        $teamMemberEmail = TeamMember::where('email',$email)->first();
        if ($userEmail || $teamMemberEmail) {
            return ['result'=>false];
        }
        return ['result'=>true];
    }

}