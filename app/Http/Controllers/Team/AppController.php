<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Notifications\PorposalUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;
use Setting;
use Storage;

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
    public function view()
    {
        return view('team.appUpload');
    }

    /**
     * upload app.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if (
            !auth()->user()->hasRole('developer')
            && Carbon::now()->gt(Carbon::parse(Setting::get('app_upload_deadline', '2018-5-21'), 'Asia/Taipei'))
        ) {
            return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
        } else {
            $request->validate([
                'app' => 'required|mimes:zip|mimetypes:application/zip, application/octet-stream, application/x-zip-compressed, multipart/x-zip|max:102400',
            ]);
            $request->app->storeAs(auth()->user()->id, 'app.zip');
            Notification::route('mail', 'ahkui@mail.fcu.edu.tw')
                        ->notify(new PorposalUpload(auth()->user()));

            return redirect()->back()->with('msg', '成功上傳！');
        }
    }

    /**
     * download app.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        if (Storage::exists(auth()->user()->id.'/app.zip')) {
            return response(Storage::get(auth()->user()->id.'/app.zip'))->withHeaders([
                    'Content-Type'        => 'application/zip',
                    'Cache-Control'       => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.auth()->user()->name.'_APP_'.Carbon::now()->toDateTimeString().'.zip"',
                ]);
        }

        return redirect()->back()->withErrors(['msg'=>'檔案不存在']);
    }
}
