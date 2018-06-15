<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Notifications\PorposalUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;
use Setting;
use Storage;

class RegisterFormController extends Controller
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
     * return register form manage view.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('team.registerFormUpload');
    }

    /**
     * upload register_form.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if (
            !auth()->user()->hasRole('developer')
            && Carbon::now()->gt(Carbon::parse(Setting::get('register_form_deadline', '2018-5-21'), 'Asia/Taipei'))
        ) {
            return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
        } else {
            $request->validate([
                'register_form' => 'required|mimes:pdf|mimetypes:application/pdf|max:10240',
            ]);
            $request->register_form->storeAs(auth()->user()->id, 'register_form.pdf');
            Notification::route('mail', 'ahkui@mail.fcu.edu.tw')
                        ->notify(new PorposalUpload(auth()->user()));

            return redirect()->back()->with('msg', '成功上傳！');
        }
    }

    /**
     * download register_form.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        if (Storage::exists(auth()->user()->id.'/register_form.pdf')) {
            return response(Storage::get(auth()->user()->id.'/register_form.pdf'))->withHeaders([
                    'Content-Type'        => 'application/pdf',
                    'Cache-Control'       => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.auth()->user()->name.'_報名表_'.Carbon::now()->toDateTimeString().'.pdf"',
                ]);
        }

        return redirect()->back()->withErrors(['msg'=>'檔案不存在']);
    }
}
