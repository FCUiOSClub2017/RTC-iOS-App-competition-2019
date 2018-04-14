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
        if ($teamMember->count() == 0) {
            return redirect()->secure(route('team.edit',[],false));
        }
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
    public function edit($level=null)
    {
        if ($level!=null) {
            if( (((int)$level) > 5 || ((int)$level) < 1) ) {
                return redirect()->secure(route('team.info',[],false));
            }
        }
        $user = auth()->user();
        $teamMember = $user->team_member;
        if (!$level && $teamMember->count() != 0) 
            return redirect()->secure(route('team.info',[],false));
        return view('team.edit',['level'=>$level]);
    }

    /**
     * update team member data.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($level=null)
    {
        $isAll = request()->input('level') == "-1";
        if ($isAll) {
            $this->parseData(1);
            $this->parseData(2);
            $this->parseData(3);
            $this->parseData(4);
            $this->parseData(5);
        }
        if(!$isAll && $level > 0 && $level<6)
            $this->parseData((int)$level);
        return redirect()->secure(route('team.info',[],false));;
    }

    private function parseData($level){
        $user = auth()->user();
        $request = request();
        $email=$request->input('email'.$level);
        $data = collect([
            'name'=>$request->input('name'.$level),
            'email'=>$email,
            'phone'=>$request->input('phone'.$level),
        ]);
        $data = $data->map(function ($value, $key) { 
            if($value==null) return "";
            return $value ;
        });
        $univercity = Univercity::where('name',request()->input('univercity'.$level))->where('course',request()->input('course'.$level))->first();
        if($univercity){
            $data->put('univercity_id',$univercity->id);
            $team_member = TeamMember::updateOrCreate([
                'level'=>$level,
                'user_id'=>$user->id,
            ],$data->toArray());
        }
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