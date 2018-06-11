<?php

namespace App\Http\Controllers;

use App\News;
use Artisan;
use Carbon\Carbon;
use Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        $this->middleware('is.developer')->only(['test', 'artisan']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with([
            'news'=> News::where('date', '<=', Carbon::now())->orderBy('date', 'decs')->get(),
        ]);
    }

    /**
     * show my permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function artisan($key, $value)
    {
        Artisan::call("$key:$value");
        abort(404);
    }

    /**
     * test the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return auth()->user()->name;
    }
}
