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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Auth::routes();*/

Route::get('/', 'IndexController@index');

Route::any('/register', 'UsersController@register');

Route::get('/profile/{username}', 'UsersController@viewProfile');

Route::any('/login', 'UsersController@login')->name('login');

Route::get('/logout', 'UsersController@logout')->name('logout');

Route::any('/check-email', 'UsersController@checkEmail');

Route::any('/check-username', 'UsersController@checkUsername');

Route::any('/step/2', 'UsersController@step2')->name('step/2');

Route::any('/step/3', 'UsersController@step3')->name('step/3');

Route::get('/review', 'UsersController@review')->name('review');

Route::get('/delete-photo/{photo}', 'UsersController@deletePhoto');

Route::get('/default-photo/{photo}', 'UsersController@defaultPhoto');

Route::get('/admin', 'AdminController@login');

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/settings', 'AdminController@settings');

Route::get('/admin/check-pwd','AdminController@chkPassword');

Route::any('/admin/view-users','AdminController@viewUsers');

Route::any('/admin/update-user-status', 'AdminController@updateUserStatus');

Route::any('/admin/update-user-details', 'AdminController@updateUserDetails');

Route::any('/admin/update-photo-status', 'AdminController@updatePhotoStatus');

Route::delete('/admin/delete-user/', 'AdminController@deleteUser');

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/home', 'IndexController@index');

