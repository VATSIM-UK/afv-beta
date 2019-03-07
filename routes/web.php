<?php

Route::get('login', 'Auth\LoginController@login');
Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('web')->group(function () {
    Route::resource('requests', 'UserRequestController')->only(['store']);
    Route::patch('users/{user}/approval', 'ApprovalController@store')->name('users.approve');
});

Route::get('/', function () {
    if (Auth::check()) {
        echo auth()->user()->name_first;
    } else {
        echo 'No user';
    }
});
