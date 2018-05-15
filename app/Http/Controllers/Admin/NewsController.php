<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
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
     * render list of news view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('date', 'decs')->get()->all();

        return view('admin.news.index')->with([
            'news'=> $news,
        ]);
    }

    /**
     * render news editor view.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $news = News::find($id);
        if (!$news) {
            $news = new News();
            $news->date = Carbon::now();
        }

        return view('admin.news.edit')->with([
            'content'=> $news->content,
            'year'   => $news->date->year,
            'month'  => $news->date->month - 1,
            'day'    => $news->date->day,
            'title'  => $news->title,
            'id'     => $news->id,
        ]);
    }

    /**
     * save news content.
     *
     * @param interger $id news id
     *
     * @return \Illuminate\Http\Response
     */
    public function save($id = null)
    {
        $date = Carbon::parse(request()->input('date'));
        $news = News::find($id);

        if (!$news) {
            $news = new News();
        }

        $news->content = request()->input('content');
        $news->date = $date;
        $news->title = request()->input('title');
        $news->save();

        return redirect()->route('news.edit', $news->id)->withInput([
            'content'=> request()->input('content'),
            'year'   => $date->year,
            'month'  => $date->month - 1,
            'day'    => $date->day,
            'title'  => request()->input('title'),
        ]);
    }
}
