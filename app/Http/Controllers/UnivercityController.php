<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Univercity;
use Cache;
class UnivercityController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function name()
    {

        $name = request()->name;
        if(Cache::has('key'.$name))
            return Cache::get('key'.$name);
        if(!$name)
            $data = Univercity::get(['name'])->unique('name')->flatten()->pluck('name');
        else
            $data = Univercity::where('name', $name)->orWhere('name', 'like', "%$name%")->get(['name'])->unique('name')->flatten()->pluck('name');

        $expiresAt = now()->addMinutes(1);

        Cache::put('key'.$name, $data, $expiresAt);
        return Cache::get('key'.$name);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function course()
    {
        $name = request()->name;
        $course = request()->course;
        if(!$name)
            return [];
        if (!$course) 
            return Univercity::where('name', $name)->get(['course'])->unique('course')->flatten()->pluck('name');
        return Univercity::where('name', $name)->where('course', $course)->orWhere('course', 'like', "%$course%")->get(['course'])->unique('course')->flatten()->pluck('name');
    }

}
