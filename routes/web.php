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

Route::get('/reg/step2', function () {
	 $course=App\Course::all();
	 $coursearray=array();
     foreach ($course as $key => $value) {
     	# code...
     	$coursearray[$value->id]=$value->title;

     }
    return view('auth.register2')->withCourse($coursearray);
});

// Route::get('/show', function () {
	 
//     return view('courses.show');
// });

// Route::get('/profile', function () {
	 
//     return view('student.profile');
// });


Route::resource('profile','Site\StudentController');


Route::get('/', 'HomeController@index')->name('home');

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/aboutus', 'Site\CmsController@aboutus')->name('aboutus');


Route::get('users/logout','Auth\LoginController@logout')->name('logout');


Route::post('/register/step-2','Auth\RegisterController@register2')->name('register.step2');

Route::resource('learn','Site\CourseController');

Route::resource('dashboard','Site\StudyDashboardController');

Auth::routes();

Route::prefix('admin')->group(function(){

Route::resource('course-management','Admin\CourseManagementController');


Route::resource('users','Admin\UsersController');


Route::resource('banner-management','Admin\BannerManagementController');

Route::resource('review-management','Admin\ReviewController');

Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');

Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('/', 'AdminHomeController@index')->name('admin.dashboard');








});

