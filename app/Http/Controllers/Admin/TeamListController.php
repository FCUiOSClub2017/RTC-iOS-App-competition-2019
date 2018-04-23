<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TeamListExport;
use App\Http\Controllers\Controller;
use App\User;
use Excel;

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
    public function teamlist()
    {
        $users = User::role('participant')->get();

        return view('admin.teamlist')->with([
            'users' => $users,
        ]);
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $users = User::role('participant')->get();

        return Excel::download(new TeamListExport(), 'TeamList_'.\Carbon\Carbon::now()->toDateTimeString().'.xlsx');
    }
}
