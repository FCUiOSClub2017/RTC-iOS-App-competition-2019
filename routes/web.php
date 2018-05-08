<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::get('profile', function () {
    return view('profile');
})->name('profile');

Auth::routes();

Route::get('verify/notice', 'VerifyController@notice')->name('verify.notice');
Route::get('verify/success', 'VerifyController@success')->name('verify.success');
Route::post('verify/resend', 'VerifyController@resendEmail')->name('verify.resend');
Route::get('verify/{token}', 'VerifyController@process')->name('verify.process');

Route::prefix('team')->group(function () {
    Route::get('/', 'TeamController@index')->name('team.info');

    Route::prefix('edit')->group(function () {
        Route::get('{level}', 'TeamController@edit')->name('team.edit');
        Route::post('{level}', 'TeamController@update')->name('team.update');
        Route::patch('{level}', 'TeamController@getTeamData')->name('team.data.get');
        Route::put('{level}', 'TeamController@checkEmailDuplication')->name('team.check.email');
        Route::delete('{level}', 'TeamController@clear')->name('team.clear');
    });

    Route::prefix('upload')->group(function () {
        Route::get('proposal', 'TeamController@proposalUploadView')->name('team.proposal.view');
        Route::post('proposal', 'TeamController@proposalUploadFile')->name('team.proposal.uplaod');
        Route::get('proposal/download', 'TeamController@proposalDownload')->name('team.proposal.download');
    });
    Route::post('rename', 'TeamController@rename')->name('team.rename');
});

Route::prefix('page')->group(function () {
    Route::get('', 'PageController@index')->name('page.index');
    Route::get('about', 'PageController@aboutEdit')->name('page.about.edit');
    Route::post('about', 'PageController@aboutUpdate')->name('page.about.update');
    Route::get('award', 'PageController@awardEdit')->name('page.award.edit');
    Route::post('award', 'PageController@awardUpdate')->name('page.award.update');
    Route::get('competitionReview', 'PageController@competitionReviewEdit')->name('page.competitionReview.edit');
    Route::post('competitionReview', 'PageController@competitionReviewUpdate')->name('page.competitionReview.update');
    Route::get('entryRequirement', 'PageController@entryRequirementEdit')->name('page.entryRequirement.edit');
    Route::post('entryRequirement', 'PageController@entryRequirementUpdate')->name('page.entryRequirement.update');
    Route::get('relatedStatement', 'PageController@relatedStatementEdit')->name('page.relatedStatement.edit');
    Route::post('relatedStatement', 'PageController@relatedStatementUpdate')->name('page.relatedStatement.update');
    Route::get('reviewAndAwards', 'PageController@reviewAndAwardsEdit')->name('page.reviewAndAwards.edit');
    Route::post('reviewAndAwards', 'PageController@reviewAndAwardsUpdate')->name('page.reviewAndAwards.update');
    Route::get('workRequirement', 'PageController@workRequirementEdit')->name('page.workRequirement.edit');
    Route::post('workRequirement', 'PageController@workRequirementUpdate')->name('page.workRequirement.update');
});

Route::get('home', 'HomeController@index')->name('user');
Route::get('test', 'HomeController@test')->name('test');
Route::get('role', 'HomeController@my_role')->name('test');

Route::prefix('univercity')->group(function () {
    Route::post('name', 'UnivercityController@name')->name('univercity.name');
    Route::post('course', 'UnivercityController@course')->name('univercity.course');
    Route::post('all', 'UnivercityController@all')->name('univercity.all');
});

Route::prefix('admin')->group(function () {
    Route::get('teamlist', 'Admin\TeamListController@teamlist')->name('admin.team.list');
    Route::get('teamlist/download', 'Admin\TeamListController@download')->name('admin.team.list.download');

    Route::get('artisan/{key}/{value}', 'HomeController@artisan')->name('admin.artisan');
});
