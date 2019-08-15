<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::get('/profile/users', 'HomeController@users')->name('users');

Route::get('verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst') -> name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone') -> name('sendEmailDone');

Route::get('/treeview', 'HomeController@getChildren')->name('treeview');