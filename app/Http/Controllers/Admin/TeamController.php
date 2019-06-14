<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TeamListExport;
use App\Http\Controllers\Controller;
use App\User;
use Carbon;
use Excel;
use Storage;
use Zipper;

class TeamController extends Controller
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
        $this->middleware('is.admin');
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamlist()
    {
        $users = User::role('participant')->whereVerify(true)->get();

        return view('admin.teamlist')->with([
            'users' => $users,
        ]);
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        return Excel::download(new TeamListExport(), 'TeamList_'.\Carbon\Carbon::now()->toDateTimeString().'.xlsx');
    }

    /**
     * document download.
     *
     * @return
     */
    public function documentDownload()
    {
        $users = User::role('participant')->whereVerify(true)->get();
        $directorys = $users->map(function ($e) {
            $data = null;
            $files = Storage::allFiles($e->id);
            if (collect($files)->count() > 0) {
                $data = $files;
            }

            return collect(['data'=>$data, 'id'=>$e->id, 'name'=>$e->name]);
        });
        $zip = Zipper::make(storage_path().'/app/document.zip');
        foreach ($directorys as $item) {
            if ($item['data'] != null) {
                $zip->folder($item['id'].'_'.$item['name']);
                foreach ($item['data'] as $file) {
                    $zip->add(storage_path().'/app/'.$file);
                }
            }
        }
        $zip->close();
        if (Storage::exists('document.zip')) {
            return Storage::download('document.zip', 'document_'.Carbon::now()->toDateTimeString().'.zip');
        } else {
            return back();
        }
    }

    /**
     * document download.
     *
     * @return
     */
    public function qualifiersDownload()
    {
        $users = User::whereVerify(true)->whereIn('id', [10, 20, 27, 58, 60, 62, 69, 73, 98, 108, 118, 119, 120, 122, 123, 127, 160, 162, 228, 234])->get();
        $directorys = $users->map(function ($e) {
            $data = null;
            $files = Storage::allFiles($e->id);
            if (collect($files)->count() > 0) {
                $data = $files;
            }

            return collect(['data'=>$data, 'id'=>$e->id, 'name'=>$e->name]);
        });
        $zip = Zipper::make(storage_path().'/app/qualifiers.zip');
        foreach ($directorys as $item) {
            if ($item['data'] != null) {
                $zip->folder($item['id'].'_'.$item['name']);
                foreach ($item['data'] as $file) {
                    $zip->add(storage_path().'/app/'.$file);
                }
            }
        }
        $zip->close();
        if (Storage::exists('qualifiers.zip')) {
            return Storage::download('qualifiers.zip', 'qualifiers_'.Carbon::now()->toDateTimeString().'.zip');
        } else {
            return back();
        }
    }

    /**
     * qualifiers app download.
     *
     * @return
     */
    public function qualifiersFormDownload()
    {
        $filename = 'qualifiers_form';
        $users = User::whereVerify(true)->whereIn('id', [10, 20, 27, 58, 60, 62, 69, 73, 98, 108, 118, 119, 120, 122, 123, 127, 160, 162, 228, 234])->get();
        $directorys = $users->map(function ($e) {
            $data = null;
            if (Storage::exists($e->id.'/register_form.pdf')) {
                $data = [$e->id.'/register_form.pdf'];
            }

            return collect(['data'=>$data, 'id'=>$e->id, 'name'=>$e->name]);
        });
        $zip = Zipper::make(storage_path().'/app/'.$filename.'.zip');
        foreach ($directorys as $item) {
            if ($item['data'] != null) {
                $zip->folder($item['id'].'_'.$item['name']);
                foreach ($item['data'] as $file) {
                    $zip->add(storage_path().'/app/'.$file);
                }
            }
        }
        $zip->close();
        if (Storage::exists($filename.'.zip')) {
            return Storage::download($filename.'.zip', $filename.'_'.Carbon::now()->toDateTimeString().'.zip');
        } else {
            return back();
        }
    }

    /**
     * qualifiers app download.
     *
     * @return
     */
    public function qualifiersAppDownload()
    {
        $filename = 'qualifiers_app';
        $users = User::whereVerify(true)->whereIn('id', [10, 20, 27, 58, 60, 62, 69, 73, 98, 108, 118, 119, 120, 122, 123, 127, 160, 162, 228, 234])->get();
        $directorys = $users->map(function ($e) {
            $data = null;
            if (Storage::exists($e->id.'/app.zip')) {
                $data = [$e->id.'/app.zip'];
            }

            return collect(['data'=>$data, 'id'=>$e->id, 'name'=>$e->name]);
        });
        $zip = Zipper::make(storage_path().'/app/'.$filename.'.zip');
        foreach ($directorys as $item) {
            if ($item['data'] != null) {
                $zip->folder($item['id'].'_'.$item['name']);
                foreach ($item['data'] as $file) {
                    $zip->add(storage_path().'/app/'.$file);
                }
            }
        }
        $zip->close();
        if (Storage::exists($filename.'.zip')) {
            return Storage::download($filename.'.zip', $filename.'_'.Carbon::now()->toDateTimeString().'.zip');
        } else {
            return back();
        }
    }
}
