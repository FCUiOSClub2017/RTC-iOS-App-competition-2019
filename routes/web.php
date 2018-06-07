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
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::prefix('profile')->group(function () {
    Route::get('/', function () {
        return view('profile');
    })->name('profile');
    Route::post('/changePassword', 'Auth\ChangePasswordController@changePassword')->name('change.password.save');

    Route::get('/changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change.password.form');
});

Route::prefix('team')->group(function () {
    Route::get('/', function () {
        return redirect()->route('team.info');
    });
    Route::get('verify/notice', 'VerifyController@notice')->name('verify.notice');
    Route::get('verify/success', 'VerifyController@success')->name('verify.success');
    Route::post('verify/resend', 'VerifyController@resendEmail')->name('verify.resend');
    Route::get('verify/{token}', 'VerifyController@process')->name('verify.process');
    Route::prefix('teammate')->group(function () {
        Route::get('/', 'TeamController@index')->name('team.info');
        Route::prefix('edit')->group(function () {
            Route::get('{level}', 'TeamController@edit')->name('team.edit');
            Route::post('{level}', 'TeamController@update')->name('team.update');
            Route::patch('{level}', 'TeamController@getTeamData')->name('team.data.get');
            Route::put('{level}', 'TeamController@checkEmailDuplication')->name('team.check.email');
            Route::delete('{level}', 'TeamController@clear')->name('team.clear');
        });
    });

    Route::prefix('files')->group(function () {
        Route::prefix('upload')->group(function () {
            Route::get('proposal', 'TeamController@proposalUploadView')->name('team.proposal.view');
            Route::post('proposal', 'TeamController@proposalUploadFile')->name('team.proposal.uplaod');
            Route::get('proposal/download', 'TeamController@proposalDownload')->name('team.proposal.download');
        });
    });
    Route::post('rename', 'TeamController@rename')->name('team.rename');
});

Route::prefix('univercity')->group(function () {
    Route::post('name', 'UnivercityController@name')->name('univercity.name');
    Route::post('course', 'UnivercityController@course')->name('univercity.course');
    Route::post('all', 'UnivercityController@all')->name('univercity.all');
    Route::get('all', 'UnivercityController@all')->name('univercity.all');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::prefix('team')->group(function () {
        Route::get('list', 'TeamController@teamlist')->name('admin.team.list');
        Route::get('list/download', 'TeamController@download')->name('admin.team.list.download');
        Route::get('document/download', 'TeamController@documentDownload')->name('admin.team.document.download');
    });
    Route::prefix('setting')->group(function () {
        \App\Http\Controllers\Admin\SettingController::routes();
    });

    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index')->name('admin.news.index');
        Route::get('edit/{id?}', 'NewsController@edit')->name('admin.news.edit');
        Route::post('save/{id?}', 'NewsController@save')->name('admin.news.save');
        Route::delete('delete/{id}', 'NewsController@delete')->name('admin.news.delete');
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
});
    Route::get('artisan/{key}/{value}', 'HomeController@artisan')->name('admin.artisan');
