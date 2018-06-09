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

Route::get('/invoice', function () {
    return view('invoice.create');
});


Route::get('/downloadPDF/{id}','Site\StudyDashboardController@downloadPDF');

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

/*banner single status change*/
Route::get('banner-status', 'Admin\BannerManagementController@bannerstatus')->name('banner.status');
/* end*/


// start support
Route::resource('support-management','Admin\SupportManagementController');
Route::any('support-search','Admin\SupportManagementController@supportsearch')->name('support-search');
// end support


Route::any('course-search','Admin\CourseManagementController@coursesearch')->name('course-search');
Route::get('delete-course', 'Admin\CourseManagementController@deletecourse')->name('delete-course');
Route::get('bulk-course-status', 'Admin\CourseManagementController@bulkcoursestatus')->name('bulk-course-status');
Route::get('course/delete/{id}', array('as' => 'admin.course.delete', 'uses' => 'Admin\CourseManagementController@delete'));
Route::get('course/statuschange/{id}', array('as' => 'admin.course.statuschange', 'uses' => 'Admin\CourseManagementController@statuschange'));
Route::resource('course-management','Admin\CourseManagementController');

Route::get('course-video/create/{id}','Admin\CourseVideoController@create')->name('course-video.create');
Route::resource('course-video-management','Admin\CourseVideoController');



Route::any('video-search','Admin\VideoManagementController@videosearch')->name('video-search');
Route::get('video-bulk-delete', 'Admin\VideoManagementController@videobulkdelete')->name('video-bulk-delete');
Route::get('bulk-video-status', 'Admin\VideoManagementController@bulkvideostatus')->name('bulk-video-status');
Route::get('video/delete/{id}', array('as' => 'admin.video.delete', 'uses' => 'Admin\VideoManagementController@delete'));
Route::get('video/statuschange/{id}', array('as' => 'admin.video.statuschange', 'uses' => 'Admin\VideoManagementController@statuschange'));
Route::resource('video-management','Admin\VideoManagementController');



Route::resource('users','Admin\UsersController');
Route::get('user/statuschange/{id}', array('as' => 'admin.user.statuschange', 'uses' => 'Admin\UsersController@statuschange'));
Route::get('bulk-user-status', 'Admin\UsersController@bulkuserstatus')->name('bulk-user-status');
Route::any('user-search','Admin\UsersController@usersearch')->name('user-search');


Route::get('bulk-banner-status', 'Admin\BannerManagementController@bulkbannerstatus')->name('bulk-banner-status');
Route::get('banner/delete/{id}', array('as' => 'admin.banner.delete', 'uses' => 'Admin\BannerManagementController@delete'));
Route::resource('banner-management','Admin\BannerManagementController');
Route::get('banner/statuschange/{id}', array('as' => 'admin.banner.statuschange', 'uses' => 'Admin\BannerManagementController@statuschange'));
//Route::get('banner-management/destroy/{id}', array('as' =>'admin.banner-management.destroy', 'uses' =>'BannerManagementController@destroy'));
Route::get('delete', 'Admin\BannerManagementController@bannerbulkdelete')->name('delete');
Route::any('banner-search','Admin\BannerManagementController@bannersearch')->name('banner-search');


Route::any('review-search','Admin\ReviewController@reviewsearch')->name('review-search');
Route::get('review-delete-bulk', 'Admin\ReviewController@reviewdeletebulk')->name('review-delete-bulk');
Route::get('bulk-review-status', 'Admin\ReviewController@bulkreviewstatus')->name('bulk-review-status');
Route::get('review/delete/{id}', array('as' => 'admin.review.delete', 'uses' => 'Admin\ReviewController@delete'));
Route::get('review/statuschange/{id}', array('as' => 'admin.review.statuschange', 'uses' => 'Admin\ReviewController@statuschange'));
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

