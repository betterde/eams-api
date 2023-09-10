<?php

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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('signup', 'SignUpController@signup')->name('auth.register');
    Route::post('password', 'SigninController@signInWithPassword');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('school', 'SchoolController@index');
    Route::post('school', 'SchoolController@store');
    Route::get('school/{school}', 'SchoolController@show');

    Route::get('teacher', 'TeacherController@index');
    Route::put('teacher/follow', 'TeacherController@follow');
    Route::get('teacher/followers', 'TeacherController@followers');

    Route::get('student', 'StudentController@index');
    Route::post('student', 'StudentController@store');
    Route::get('student/{student}', 'StudentController@show');

    Route::post('message/send', 'MessageController@send');
    Route::get('message/history', 'MessageController@history');

    Route::get('invitation', 'InvitationController@index');
    Route::post('invitation', 'InvitationController@store');
    Route::get('invitation/{invitation}', 'InvitationController@show');
    Route::delete('invitation/{invitation}', 'InvitationController@destroy');
});

Route::group(['prefix' => 'account', 'namespace' => 'Account', 'middleware' => 'auth:api'], function () {
    Route::get('profile', 'ProfileController@show');
});