<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Setting;

class SettingController extends Controller
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
        $this->middleware('is.admin');
    }

    /**
     * config register deadline.
     *
     * @return \Illuminate\Http\Response
     */
    public function setRegisterDeadline()
    {
        $date = request()->input('date');
        if (!$date) {
            return [
                'status'=> false,
            ];
        }
        $date = Carbon::parse($date);
        $date->addDay();
        $date->subSecond();
        Setting::set('register_deadline', $date->toDateTimeString());
        Setting::save();

        return [
            'status'=> true,
            'date'  => Setting::get('register_deadline'),
        ];
    }

    /**
     * config proposal deadline.
     *
     * @return \Illuminate\Http\Response
     */
    public function setProposalDeadline()
    {
        $date = request()->input('date');
        if (!$date) {
            return [
                'status'=> false,
            ];
        }
        $date = Carbon::parse($date);
        $date->addDay();
        $date->subSecond();
        Setting::set('proposal_deadline', $date->toDateTimeString());
        Setting::save();

        return [
            'status'=> true,
            'date'  => Setting::get('proposal_deadline'),
        ];
    }

    /**
     * make default routes.
     *
     * @return void
     */
    public static function routes()
    {
        app()->make('router')->post('setRegisterDeadline', 'SettingController@setRegisterDeadline')->name('admin.config.deadline.register');
        app()->make('router')->post('setProposalDeadline', 'SettingController@setProposalDeadline')->name('admin.config.deadline.proposal');
    }
}
