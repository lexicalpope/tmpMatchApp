<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/igomatch', 'Api\BasicController@goMatchRow');
Route::get('/ibyematch', 'Api\BasicController@byeMatchRow');
Route::get('/checkMatch', 'Api\BasicController@getMatch');
Route::get('/getMessage', 'Api\BasicController@getMessage');
Route::get('/sendMessage', 'Api\BasicController@sendMessage');

Route::get('/getHello', 'Api\BasicController@getHello');

