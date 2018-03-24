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
    return redirect('coming-soon');
});

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
