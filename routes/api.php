<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Teacher\RegisterController;

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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('password', 'SigninController@signInWithPassword');
});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher'], function () {
    Route::post('register', 'RegisterController@register');
});

Route::group(['prefix' => 'school', 'namespace' => 'School', 'middleware' => 'auth:api'], function () {
    Route::post('apply', 'ApplyController@apply');
});