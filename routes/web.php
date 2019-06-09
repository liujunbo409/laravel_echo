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
    return view('welcome');
});

Route::get('/triggeralarm', function () {
    return view('welcome');
});
//Route::get('/look', function () {
//    return view('look');
//});
Route::get('/look', 'EchoController@look');
//Route::group(['prefix' => '', 'middleware' => ['auth']], function () {

//});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
