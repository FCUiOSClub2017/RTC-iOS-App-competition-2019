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
Route::get('verify/{token}', 'VerifyController@process')->name('verify.process');


Route::get('team', 'TeamController@index')->name('team.info');
Route::get('team/edit/{level?}', 'TeamController@edit')->name('team.edit');
Route::post('team/edit/{level?}', 'TeamController@update')->name('team.update');
Route::delete('team/delete/{level}', 'TeamController@clear')->name('team.clear');
Route::post('team/email', 'TeamController@uniqueEmail')->name('team.check.email');
Route::post('team/data/get/{level}', 'TeamController@getTeamData')->name('team.data.get');

Route::get('/home', 'HomeController@index')->name('user');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('role', 'HomeController@my_role')->name('test');

Route::post('univercity/name', 'UnivercityController@name')->name('univercity.name');
Route::post('univercity/course', 'UnivercityController@course')->name('univercity.course');

