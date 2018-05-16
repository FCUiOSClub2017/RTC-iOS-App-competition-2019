<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EditPageController extends Controller
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
        $this->middleware('can.set.admin');
    }

    public function index()
    {
        return view('admin.editPage.index');
    }

    public function aboutEdit()
    {
        return view('admin.editPage.about');
    }

    public function aboutUpdate()
    {
        return '';
    }

    public function awardEdit()
    {
        return view('admin.editPage.award');
    }

    public function awardUpdate()
    {
        return '';
    }

    public function competitionReviewEdit()
    {
        return view('admin.editPage.competition_review');
    }

    public function competitionReviewUpdate()
    {
        return '';
    }

    public function entryRequirementEdit()
    {
        return view('admin.editPage.entry_requirement');
    }

    public function entryRequirementUpdate()
    {
        return '';
    }

    public function relatedStatementEdit()
    {
        return view('admin.editPage.related_statement');
    }

    public function relatedStatementUpdate()
    {
        return '';
    }

    public function reviewAndAwardsEdit()
    {
        return view('admin.editPage.review_and_awards');
    }

    public function reviewAndAwardsUpdate()
    {
        return '';
    }

    public function workRequirementEdit()
    {
        return view('admin.editPage.work_requirement');
    }

    public function workRequirementUpdate()
    {
        return '';
    }
}
