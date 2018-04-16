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


Route::get('team', 'TeamController@index')->name('team.info');
Route::get('team/{level}', 'TeamController@edit')->name('team.edit');
Route::post('team/{level}', 'TeamController@update')->name('team.update');
Route::patch('team/{level}', 'TeamController@getTeamData')->name('team.data.get');
Route::put('team/{level}', 'TeamController@uniqueEmail')->name('team.check.email');
Route::delete('team/{level}', 'TeamController@clear')->name('team.clear');

Route::get('page', 'PageController@index')->name('page.index');
Route::get('page/about', 'PageController@aboutEdit')->name('page.about.edit');
Route::post('page/about', 'PageController@aboutUpdate')->name('page.about.update');
Route::get('page/award', 'PageController@awardEdit')->name('page.award.edit');
Route::post('page/award', 'PageController@awardUpdate')->name('page.award.update');
Route::get('page/competitionReview', 'PageController@competitionReviewEdit')->name('page.competitionReview.edit');
Route::post('page/competitionReview', 'PageController@competitionReviewUpdate')->name('page.competitionReview.update');
Route::get('page/entryRequirement', 'PageController@entryRequirementEdit')->name('page.entryRequirement.edit');
Route::post('page/entryRequirement', 'PageController@entryRequirementUpdate')->name('page.entryRequirement.update');
Route::get('page/relatedStatement', 'PageController@relatedStatementEdit')->name('page.relatedStatement.edit');
Route::post('page/relatedStatement', 'PageController@relatedStatementUpdate')->name('page.relatedStatement.update');
Route::get('page/reviewAndAwards', 'PageController@reviewAndAwardsEdit')->name('page.reviewAndAwards.edit');
Route::post('page/reviewAndAwards', 'PageController@reviewAndAwardsUpdate')->name('page.reviewAndAwards.update');
Route::get('page/workRequirement', 'PageController@workRequirementEdit')->name('page.workRequirement.edit');
Route::post('page/workRequirement', 'PageController@workRequirementUpdate')->name('page.workRequirement.update');


Route::get('/home', 'HomeController@index')->name('user');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('role', 'HomeController@my_role')->name('test');

Route::post('univercity/name', 'UnivercityController@name')->name('univercity.name');
Route::post('univercity/course', 'UnivercityController@course')->name('univercity.course');

Route::get('admin/teamlist', 'Admin\TeamListController@teamlist')->name('admin.team.list');
