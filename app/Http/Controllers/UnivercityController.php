<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Univercity;
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
        if(!$name)
            return Univercity::get(['name'])->unique('name')->flatten();
        return Univercity::where('name', $name)->orWhere('name', 'like', "%$name%")->get(['name'])->unique('name')->flatten();
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
            return Univercity::where('name', $name)->get(['course'])->unique('course')->flatten();
        return Univercity::where('name', $name)->where('course', $course)->orWhere('course', 'like', "%$course%")->get(['course'])->unique('course')->flatten();
    }

}
