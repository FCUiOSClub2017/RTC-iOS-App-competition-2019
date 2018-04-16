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
        $this->middleware('is.participant');
        $this->errorMessage=collect();
    }

    /**
     * render team info view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\Propaganistas\LaravelPhone\PhoneNumber::make('0966440833',"tw")->formatInternational());
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
        $isSameMember = TeamMember::whereEmail($email)->where('user_id',$user->id)->where('level',$level)->first();
        if(((int)$level) > 3)
            $isDuplicationMember = TeamMember::whereEmail($email)->where('level','<>',4)->where('level','<>',5)->first();
        $isDuplication = $isDuplicationMember && !$isSameMember;
        if($isDuplication)
        {
            return redirect()->back()->withErrors(['error'=>"此電子郵件 $email 已被其他隊伍使用！"]);
        }
        $univercity = Univercity::where('name',request()->input('univercity'))->where('course',request()->input('course'))->first();

        if(!$univercity){
            return redirect()->back()->withErrors(['error'=>"學校/學系不存在！"]);
        }

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|phone:TW',
            'email' => 'required|email',
        ]);

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
    public function uniqueEmail($level)
    {
        $email = request()->email;
        if (!$email) 
            return [];
        $user = auth()->user();
        $isDuplicationMember = TeamMember::whereEmail($email)->first();
        $isSameMember = TeamMember::whereEmail($email)->where('user_id',$user->id)->where('level',$level)->first();
        if((int)$level > 3){
            $isDuplicationMember = TeamMember::whereEmail($email)->where('level','<>',4)->where('level','<>',5)->first();
        }

        $isDuplication = $isDuplicationMember && !$isSameMember;

        return ['result'=>!$isDuplication];
    }

}