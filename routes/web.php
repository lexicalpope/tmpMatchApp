<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/gomatch', 'HomeController@goMatchRow');
Route::get('/byematch', 'HomeController@byeMatchRow');
Route::get('/result/ajax', 'HomeController@getMatch');
Route::get('/result/message', 'HomeController@getMessage');
Route::get('/result/mssend', 'HomeController@sendMessage');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ilogin', 'TmppController@ilogin');