<?php

namespace App\Http\Controllers\Team;

use App\TeamMember;
use App\Univercity;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Setting;
use Storage;
use Notification;
use App\Notifications\PorposalUpload;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
        $this->middleware('deadline.register')->only('rename');
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
        for ($i = 1; $i < 6; $i++) {
            if (!$data->contains($i)) {
                $tmp = new TeamMember(['level'=>$i]);
                $teamMember->push($tmp);
            }
        }

        return view('team.info', ['team'=>$teamMember]);
    }

    /**
     * render edit team member view.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($level)
    {
        if ((((int) $level) > 5 || ((int) $level) < 1)) {
            return back();
        }

        return view('team.edit', ['level'=>$level]);
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
        $target = $teamMember->where('level', $level)->first();
        if ($target) {
            $target->delete();
        }

        return back();
    }

    /**
     * Rename team.
     *
     * @return \Illuminate\Http\Response
     */
    public function rename(Request $request)
    {
        $request->validate([
                   'name'     => 'required|string|max:255|unique:users',
               ]);
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->save();

        return back();
    }
}
