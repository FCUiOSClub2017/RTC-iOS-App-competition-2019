<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Notifications\AppUpload;
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

    public function sendHeaders($file, $type, $name = null)
    {
        if (empty($name)) {
            $name = basename($file);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Transfer-Encoding: binary');
        header('Content-Disposition: attachment; filename="'.$name.'";');
        header('Content-Type: '.$type);
        header('Content-Length: '.filesize($file));
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
            && Carbon::now()->gt(Carbon::parse(Setting::get('app_upload_deadline', '2019-5-15'), 'Asia/Taipei'))
        ) {
            return redirect()->back()->withErrors(['msg'=>'不在開放時間內！']);
        } else {
            $request->validate([
                'app' => 'required|mimes:zip|mimetypes:application/zip, application/octet-stream, application/x-zip-compressed, multipart/x-zip|max:1048576',
            ]);
            $request->app->storeAs(auth()->user()->id, 'app.zip');
            Notification::route('mail', 'stacse@straighta.com.tw')
                        ->notify(new AppUpload(auth()->user()));

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
        $id = auth()->user()->id;
        $timeString = Carbon::now()->toDateTimeString();
        if (Storage::exists($id.'/app.zip')) {
            $file = Storage::path($id.'/app.zip');
            if (is_file($file)) {
                $this->sendHeaders($file, 'application/zip', "team_$id._$timeString.zip");
                $chunkSize = 1024 * 1024;
                $handle = fopen($file, 'rb');
                while (!feof($handle)) {
                    $buffer = fread($handle, $chunkSize);
                    echo $buffer;
                    ob_flush();
                    flush();
                }
                fclose($handle);
                exit;
            }

            return response(Storage::get(auth()->user()->id.'/app.zip'))->withHeaders([
                    'Content-Type'        => 'application/zip',
                    'Cache-Control'       => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.auth()->user()->name.'_APP_'.$timeString.'.zip"',
                ]);
        }

        return redirect()->back()->withErrors(['msg'=>'檔案不存在']);
    }
}
