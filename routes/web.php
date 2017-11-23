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






Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/me', 'IndexController@me')->name('me');
    Route::resource('passages', 'PassagesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('favors', 'FavorsController');
});
