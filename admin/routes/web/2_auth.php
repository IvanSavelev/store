<?php
Route::get('auth/login', 'Auth\LoginController@loginForm')->name('auth.login.form'); //Page for write password and email
Route::post('auth/login', 'Auth\LoginController@login')->name('auth.login'); //Sending password and email
Route::get('auth/login_out', 'Auth\LoginController@loginOut')->name('auth.login.out'); //Login Out

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.show_registration_form'); //Page for add new user
Route::post('auth/register', 'Auth\RegisterController@register')->name('auth.register'); //Page for add new user

//showRegistrationForm
/*Route::get('admin/auth_out', 'Admin\Login\LoginController@getLoginOut')->name('admin.login.get_login_out');

Route::get('admin/auth/register', 'Admin\Register\RegisterController@get_register')->name('admin.register.get_register');
//Route::post('admin/register', 'Admin\Register\RegisterController@post_register')->middleware(['web','guest'])->name('admin.register.post_register');
Route::post('admin/auth/register', 'Admin\Register\RegisterController@post_register')->name('admin.register.post_register');*/