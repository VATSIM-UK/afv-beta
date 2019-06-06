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

Route::get('request', 'UserRequestController@store')->middleware('auth')->name('request');

Route::get('/prefile', 'FPLPrefileController@get')->name('prefile');
Route::post('/prefile', 'FPLPrefileController@post')->name('prefile.submit');

// For testing purposes of the new dataserver - FSExpo
Route::get('vatsim-data', function () {
    return response(Storage::get('vatsim-data.json'))->header('Content-Type', 'application/json');
});

Route::middleware('admin')->group(function () {
    Route::get('admin', 'ApprovalsPageController')->name('admin');
    Route::patch('users/{cid}/approve', 'ApprovalController@approve')->name('users.approve');
    Route::delete('users/{cid}/revoke', 'ApprovalController@revoke')->name('users.revoke');
});