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

Route::get('/', 'Frontend\MainController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:Administrator']], function () {
        Route::group(['prefix' => 'Administrator'], function () {
            Route::get('/', 'Backend\MainController@index')->name('admin.main');
            Route::resource('User', 'Backend\UserController');
        });

        Route::group(['prefix' => 'Restore'], function () {
            Route::post('User', 'Backend\UserController@restore')->name('User.restore');
        });

        Route::group(['prefix' => 'Perma-Del'], function () {
            Route::post('User', 'Backend\UserController@permanent')->name('User.permanent');
        });
    });
});


Route::group(['prefix' => 'json'], function () {
    Route::get('user/trashed', 'JsonController@trashedUser')->name('json.trashed.user');
});