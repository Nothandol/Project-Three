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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/create', 'UploadsController@create');

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/','AdminController@index')->name('admin.dashboard');
    
});

Route::resource('/uploads', 'UploadsController');
Route::get('/index', 'Auth\LoginController@index'); //check


Route::get('/index','UploadsController@getView')-> name('upload.file');
Route::post('/index','UploadsController@store');

/*Route::get('/index', function () {
    return view('uploads.index');
});*/


