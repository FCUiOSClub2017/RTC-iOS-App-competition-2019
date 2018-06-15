<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\TeamMember;
use App\Univercity;
use App\User;
use Illuminate\Http\Request;

class EditController extends Controller
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
        $this->middleware('can.edit.teammate');
    }

    /**
     * update team member data.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($level)
    {
        if ((((int) $level) > 5 || ((int) $level) < 1)) {
            return back();
        }
        $user = auth()->user();
        $request = request();
        $email = $request->input('email');

        if ($this->isDuplicationEmail($email, $level)) {
            return redirect()->back()->withErrors(['error'=>"此電子郵件 $email 已被其他隊伍使用！"]);
        }
        $univercity = Univercity::where('name', request()->input('univercity'))->where('course', request()->input('course'))->first();

        if (!$univercity) {
            return redirect()->back()->withErrors(['error'=>'學校 / 學系不存在！']);
        }

        $request->validate([
            'name'  => 'required|max:255',
            'phone' => 'required|phone:TW',
            'email' => 'required|email',
        ]);

        $data = collect([
            'name' => $request->input('name'),
            'email'=> $email,
            'phone'=> $request->input('phone'),
        ]);
        $data->put('univercity_id', $univercity->id);
        $team_member = TeamMember::updateOrCreate([
            'level'  => $level,
            'user_id'=> $user->id,
        ], $data->toArray());

        return redirect()->route('team.info');
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
        $target = $teamMember->where('level', $level)->first();
        if ($target) {
            $target->univercity;
        }

        return ['result'=>$target];
    }

    /**
     * Check email duplication response.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkEmailDuplication($level)
    {
        $email = request()->email;
        if (!$email) {
            return [];
        }

        return ['result'=>$this->isDuplicationEmail($email, $level)];
    }

    /**
     * check email is unique or duplication.
     *
     * @param string $email
     * @param string $level
     *
     * @return bool return isDuplication
     */
    private function isDuplicationEmail($email, $level)
    {
        $user = auth()->user();

        $isDuplicationMember = TeamMember::whereEmail($email)->first();

        if ((int) $level > 3) {
            $isDuplicationMember = TeamMember::whereEmail($email)->where('level', '<>', 4)->where('level', '<>', 5)->first();
        }

        $isSameMember = TeamMember::whereEmail($email)->where('user_id', $user->id)->where('level', $level)->first();

        if ($isDuplicationMember != null && !$isSameMember) {
            return true;
        }

        $isDuplicationTeamEmail = User::role('participant')->where('id', '<>', $user->id)->where('email', $email)->first();
        if ($isDuplicationTeamEmail) {
            return true;
        }

        return false;
    }
}
