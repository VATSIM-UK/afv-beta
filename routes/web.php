<?php

Route::get('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::middleware('web')->group(function () {
    Route::resource('requests', 'UserRequestController')->only(['store']);
    Route::patch('users/{user}/approval', 'ApprovalController@store')->name('users.approve');
});

Route::get('/', 'LandingController')->name('landing');

Route::get('request', 'UserRequestController@store')->name('request');

//Route::get('/prefile/send', 'FlightPlanPrefile@send')->name('prefile');