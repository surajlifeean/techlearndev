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
    return view('home');
});


Route::get('/sendsms', 'HomeController@sendsms')->name('sendsms');

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/learn', function () {
    return view('courses.index');
});

Route::get('users/logout','Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::prefix('admin')->group(function(){


Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');

Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('/', 'AdminHomeController@index')->name('admin.dashboard');








});

