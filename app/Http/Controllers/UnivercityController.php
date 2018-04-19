<?php

namespace App\Http\Controllers;

use App\Univercity;
use Cache;
use Illuminate\Http\Request;

class UnivercityController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function name()
    {
        $name = request()->name ? request()->name : '';
        if (Cache::has('univercity_'.$name)) {
            return Cache::get('univercity_'.$name);
        }
        if ($name == '') {
            $data = Univercity::orderBy('name')->get()->unique('name')->flatten()->pluck('name');
        } else {
            $data = Univercity::where('name', $name)->orWhere('name', 'like', "%$name%")->orderBy('name')->get()->unique('name')->flatten()->pluck('name');
        }
        $expiresAt = now()->addMinutes(1);
        Cache::put('univercity_'.$name, $data, $expiresAt);

        return Cache::get('univercity_'.$name);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function course()
    {
        $name = request()->name ? request()->name : '';
        $course = request()->course ? request()->course : '';
        if ($name == '') {
            return [];
        }
        if (Cache::has('univercity_'.$name.'_'.$course)) {
            return Cache::get('univercity_'.$name.'_'.$course);
        }
        if ($course == '') {
            $data = Univercity::where('name', $name)->orderBy('course')->get()->unique('course')->flatten()->pluck('course');
        } else {
            $data = Univercity::where('name', $name)->where('course', $course)->orWhere('name', $name)->where('course', 'like', "%$course%")->orderBy('course')->get()->unique('course')->flatten()->pluck('course');
        }
        $expiresAt = now()->addMinutes(1);
        Cache::put('univercity_'.$name.'_'.$course, $data, $expiresAt);

        return Cache::get('univercity_'.$name.'_'.$course);
    }
}
