<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TeamMember;
use Carbon\Carbon;
use Validator;
use App\Univercity;

class TeamController extends Controller
{
    private $errorMessage;
    /**
     * Create a new controller instance and set middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.verify');
        $this->middleware('is.participant')->except('index');
        $this->errorMessage=collect();
    }

    /**
     * render team info view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $teamMember = $user->team_member()->orderBy('level')->get();
        $data = $teamMember->pluck('level');
        for ($i=1; $i < 6; $i++) { 
            if(!$data->contains($i))
            {
                $tmp = new TeamMember(['level'=>$i]);
                $teamMember->push($tmp);
            }
        }
        return view('team.info',['team'=>$teamMember]);
    }

    /**
     * render edit team member view.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($level)
    {
        if( (((int)$level) > 5 || ((int)$level) < 1) ) 
            return back();
        return view('team.edit',['level'=>$level]);
    }

    /**
     * update team member data.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($level)
    {
        if( (((int)$level) > 5 || ((int)$level) < 1) ) 
            return back();
        $user = auth()->user();
        $request = request();
        $email=$request->input('email');
        $isDuplicationMember = TeamMember::whereEmail($email)->first();
        if(((int)$level) > 3)
            $isDuplicationMember = TeamMember::whereEmail($email)->where('level','<>',4)->where('level','<>',5)->first();
        $isDuplication = $isDuplicationMember || $isDuplicationMember;
        if($isDuplication)
        {
            return redirect()->back()->withErrors(['error'=>"此電子郵件 $email 已被其他隊伍使用！"]);
        }
        $univercity = Univercity::where('name',request()->input('univercity'))->where('course',request()->input('course'))->first();
        if($univercity){
            $data = collect([
                'name'=>$request->input('name'),
                'email'=>$email,
                'phone'=>$request->input('phone'),
            ]);
            $data->put('univercity_id',$univercity->id);
            $team_member = TeamMember::updateOrCreate([
                'level'=>$level,
                'user_id'=>$user->id,
            ],$data->toArray());
        }
        return redirect()->secure(route('team.info',[],false));
    }

    /**
     * Get team member data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamData($level)
    {
        $user = auth()->user();
        $teamMember = $user->team_member;
        $target = $teamMember->where('level',$level)->first();
        if($target)
            $target->univercity;
        return ['result'=>$target];
    }

    /**
     * Get team member data.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear($level)
    {
        $user = auth()->user();
        $teamMember = $user->team_member;
        $target = $teamMember->where('level',$level)->first();
        if($target)
            $target->delete();
        return back();
    }

    /**
     * Check unique Email.
     *
     * @return \Illuminate\Http\Response
     */
    public function uniqueEmail()
    {
        $email = request()->email;
        $level = request()->level;
        if (!$email) 
            return [];
        if($level == "5" || $level == "4"){
            $teamMemberEmail = TeamMember::where('email',$email)->where('level','<>',5)->where('level','<>',4)->first();
            if ($teamMemberEmail)
                return ['result'=>false];
            return ['result' => true];
        }
        $userEmail = User::where('email',$email)->first();
        $teamMemberEmail = TeamMember::where('email',$email)->first();
        if ($userEmail || $teamMemberEmail) 
            return ['result'=>false];
        return ['result'=>true];
    }

}