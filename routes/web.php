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
    // \App\Jobs\RegistedAccount::dispatch();
    
    return view('welcome');
})->name('app-competition-home');

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

