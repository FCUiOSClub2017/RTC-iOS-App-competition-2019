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
     * upload proposal.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if (
            !auth()->user()->hasRole('developer')
            && Carbon::now()->gt(Carbon::parse(Setting::get('proposal_deadline', '2018-5-21'), 'Asia/Taipei'))
        ) {
            return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
        } else {
            $request->validate([
                'proposal' => 'required|mimes:pdf|mimetypes:application/pdf|max:10240',
            ]);
            $request->proposal->storeAs(auth()->user()->id, 'proposal.pdf');
            Notification::route('mail', 'ahkui@mail.fcu.edu.tw')
                        ->notify(new PorposalUpload(auth()->user()));

            return redirect()->back()->with('msg', '成功上傳！');
        }
    }

    /**
     * download proposal.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        if (Storage::exists(auth()->user()->id.'/proposal.pdf')) {
            return response(Storage::get(auth()->user()->id.'/proposal.pdf'))->withHeaders([
                    'Content-Type'        => 'application/pdf',
                    'Cache-Control'       => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.auth()->user()->name.'_企劃書_'.Carbon::now()->toDateTimeString().'.pdf"',
                ]);
        }

        return redirect()->back()->withErrors(['msg'=>'檔案不存在']);
    }
}
