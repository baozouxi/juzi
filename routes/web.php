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
    Route::resource('labels', 'LabelsController');
});



//以下操作需要管理员权限 到时候添加一个管理员中间件
Route::group(['middleware' => 'adminCheck'], function () {
    Route::get('/admin', 'Admin\UsersController@index');
    Route::resource('users', 'Admin\UsersController');
    Route::get('/admin/passages', 'Admin\PassagesController@index');
    Route::get('/admin/labels', 'Admin\LabelsController@index');
    Route::post('/admin/passages/{id}/check', 'Admin\PassagesController@check');
    Route::post('/admin/labels/{id}/check', 'Admin\LabelsController@check');
});



//后台登录
Route::get('/admin/login', 'Admin\LoginController@index')->name('loginView');
Route::get('/admin/logout', 'Admin\LoginController@logout')->name('logout');
Route::post('/admin/login', 'Admin\LoginController@login')->name('loginPro');