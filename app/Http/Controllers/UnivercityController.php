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
    public function name($name=null)
    {
        if(!$name)
            return Univercity::get(['name'])->unique('name')->flatten();
        return Univercity::where('name', $name)->orWhere('name', 'like', "%$name%")->get(['name'])->unique('name')->flatten();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function course($name,$course=null)
    {
        if(request()->user()->verify)
            return redirect()->secure(route('home', [], false));
        return view('auth.verify.notice');
    }

}
