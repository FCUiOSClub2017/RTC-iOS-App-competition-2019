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
     * config register form deadline.
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
     * config app deadline.
     *
     * @return \Illuminate\Http\Response
     */
    public function setRegisterFormDeadline()
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
        Setting::set('register_form_deadline', $date->toDateTimeString());
        Setting::save();

        return [
            'status'=> true,
            'date'  => Setting::get('register_form_deadline'),
        ];
    }

    /**
     * config proposal deadline.
     *
     * @return \Illuminate\Http\Response
     */
    public function setAppDeadline()
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
        Setting::set('app_upload_deadline', $date->toDateTimeString());
        Setting::save();

        return [
            'status'=> true,
            'date'  => Setting::get('app_upload_deadline'),
        ];
    }

    /**
     * config news active.
     *
     * @return \Illuminate\Http\Response
     */
    public function setNewsStatus()
    {
        Setting::set('active_news', !Setting::get('active_news', false));
        Setting::save();

        return [
            'status'=> true,
            'date'  => Setting::get('active_news'),
        ];
    }

    /**
     * make default routes.
     *
     * @return void
     */
    public static function routes()
    {
        app()->make('router')->post('setNewsStatus', 'SettingController@setNewsStatus')->name('admin.config.status.news');
        app()->make('router')->post('setRegisterDeadline', 'SettingController@setRegisterDeadline')->name('admin.config.deadline.register');
        app()->make('router')->post('setProposalDeadline', 'SettingController@setProposalDeadline')->name('admin.config.deadline.proposal');
        app()->make('router')->post('setRegisterFormDeadline', 'SettingController@setRegisterFormDeadline')->name('admin.config.deadline.register.form');
        app()->make('router')->post('setAppDeadline', 'SettingController@setAppDeadline')->name('admin.config.deadline.app');
    }
}
