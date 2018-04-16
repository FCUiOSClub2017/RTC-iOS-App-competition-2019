<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
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
        $this->middleware('is.participant')->except('index');
        $this->errorMessage=collect();
    }
    public function index(){
        return view('page.review_and_awards');
    }

    public function aboutEdit(){
        return view('page.competition_review');
    }

    public function aboutUpdate(){
        return "";
    }

    public function awardEdit(){
        return view('page.related_statement');
    }

    public function awardUpdate(){
        return "";
    }

    public function competitionReviewEdit(){
        return view('page.award');
    }

    public function competitionReviewUpdate(){
        return "";
    }

    public function entryRequirementEdit(){
        return view('page.entry_requirement');
    }

    public function entryRequirementUpdate(){
        return "";
    }

    public function relatedStatementEdit(){
        return view('page.index');
    }

    public function relatedStatementUpdate(){
        return "";
    }

    public function reviewAndAwardsEdit(){
        return view('page.about');
    }

    public function reviewAndAwardsUpdate(){
        return "";
    }

    public function workRequirementEdit(){
        return view('page.work_requirement');
    }

    public function workRequirementUpdate(){
        return "";
    }

}
