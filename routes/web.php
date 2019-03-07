<?php

Route::get('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/', 'LandingController')->name('landing');