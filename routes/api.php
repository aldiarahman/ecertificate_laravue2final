<?php

use Illuminate\Http\Request;

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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::delete('deleteuser/{id}', 'UserController@delete')->middleware('isAdmin');
    Route::post('createuser', 'UserController@store')->middleware('isAdmin');
    Route::get('edituser/{id}', 'UserController@edit')->middleware('isAdmin');
    Route::post('updateuser/{id}', 'UserController@update')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
});

Route::group(['middleware' => 'auth:api'], function(){
    // Kegiatan
    Route::get('listkegiatan', 'KegiatanController@index')->middleware('isAdmin');
    Route::delete('deletekegiatan/{id}', 'KegiatanController@delete')->middleware('isAdmin');
    Route::post('createkegiatan', 'KegiatanController@store')->middleware('isAdmin');
    Route::get('editkegiatan/{id}', 'KegiatanController@edit')->middleware('isAdmin');
    Route::post('updatekegiatan/{id}', 'KegiatanController@update')->middleware('isAdmin');
});




