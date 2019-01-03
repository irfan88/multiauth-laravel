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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('event', ['middleware' => ['auth', 'role:organizer'], function() {
	return "Berhasil mengakses halaman event";
}])->name('event');
Route::get('event-history', ['middleware' => ['auth', 'role:participant'], function() {
	return "Berhasil mengakses history event.";
}])->name('event-history');

Route::get('settings', ['middleware' => 'auth', 'uses' => 'HomeController@settings'])->name('settings');

Route::get('premium', ['middleware' => ['auth'], 'uses' => 'HomeController@premium'])->name('premium');

Route::get('edit-event/{id}', 'HomeController@editEvent');
Route::get('join-event/{id}', 'HomeController@joinEvent');
Route::get('edit-organization/{id}', 'HomeController@editOrganization');



Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');
});