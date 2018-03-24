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



$route = function () { 
    Route::get('/', function () {
        return redirect()->route('coming-soon');
    });

    Route::get('/coming-soon', function () {
        return view('coming-soon');
    })->name('coming-soon');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
};

if (App::environment('server')) 
    Route::prefix('2018')->group($route);
if (App::environment('local')) 
    $route();