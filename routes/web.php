<?php

// To-Do: Apply Middleware?
Route::get('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Not sure if it's needed. Commented out in case it is
/*
Route::middleware('web')->group(function () {
    Route::resource('requests', 'UserRequestController')->only(['store']);
    Route::patch('users/{user}/approval', 'ApprovalController@store')->name('users.approve');
});
*/

// Landing/Main Page
Route::get('/', 'LandingController')->name('landing');

//--------------------------------------------------------------------------
// Authenticated Endpoint
//--------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    // User submits request
    Route::get('request', 'UserRequestController@store')->name('request');
    // --
    // Discord OAuth2
    Route::get('/discord/login', 'DiscordOAuth2Controller@login')->name('discord.login');
    Route::get('/discord/validate', 'DiscordOAuth2Controller@validateLogin');
    // --
});

//--------------------------------------------------------------------------
// Admin Endpoint
//--------------------------------------------------------------------------
Route::middleware('admin')->group(function () {
    Route::get('admin', 'ApprovalsPageController')->name('admin');
    Route::patch('users/{cid}/approval', 'ApprovalController@approve')->name('users.approve');
    Route::delete('users/{cid}/approval', 'ApprovalController@revoke')->name('users.revoke');
});

// Prefile prefill and submission
Route::get('/prefile', 'FPLPrefileController@get')->name('prefile');
Route::post('/prefile', 'FPLPrefileController@post')->name('prefile.submit');

//--------------------------------------------------------------------------
// Dataserver-NG
//--------------------------------------------------------------------------
Route::get('vatsim-data', function () {
    return response(Storage::get('vatsim-data.json'))->header('Content-Type', 'application/json');
});
//--------------------------------------------------------------------------