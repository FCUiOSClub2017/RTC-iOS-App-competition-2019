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
$extra_path = '';
if (App::environment('server'))
    $extra_path = '/2018';


Route::get('/', function () {
    return redirect($extra_path.'/coming-soon');
});

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
