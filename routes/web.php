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

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'greencaptain'], function () {
  Route::get('/login', 'GreencaptainAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'GreencaptainAuth\LoginController@login');
  Route::post('/logout', 'GreencaptainAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'GreencaptainAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'GreencaptainAuth\RegisterController@register');

  Route::post('/password/email', 'GreencaptainAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'GreencaptainAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'GreencaptainAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'GreencaptainAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'staff'], function () {
  Route::get('/login', 'StaffAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StaffAuth\LoginController@login');
  Route::post('/logout', 'StaffAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StaffAuth\RegisterController@register');

  Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'member'], function () {
  Route::get('/login', 'MemberAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'MemberAuth\LoginController@login');
  Route::post('/logout', 'MemberAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'MemberAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'MemberAuth\RegisterController@register');

  Route::post('/password/email', 'MemberAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'MemberAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'MemberAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'MemberAuth\ResetPasswordController@showResetForm');
});
