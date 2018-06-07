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

class AppController extends Controller
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
     * return app manage view.
     *
     * @return \Illuminate\Http\Response
     */
    public function appUploadView()
    {
        return view('team.appUpload');
    }
}
