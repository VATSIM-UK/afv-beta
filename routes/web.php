<?php

// To-Do: Apply Middleware?
Route::get('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

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
    Route::get('discord/login', 'DiscordOAuth2Controller@login')->name('discord.login');
    Route::get('discord/validate', 'DiscordOAuth2Controller@validateLogin');
    // --
    // Prefile prefill and submission
    Route::get('prefile', 'FPLPrefileController@get')->name('prefile');
    Route::post('prefile', 'FPLPrefileController@post')->name('prefile.submit');
    // --
});
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('client', function () {
        return response()->download(storage_path('app/Audio For VATSIM.msi'));
    })->name('client.download');
});

//--------------------------------------------------------------------------
// Admin Endpoint
//--------------------------------------------------------------------------
Route::middleware('admin')->group(function () {
    Route::get('admin', 'AdminPageController')->name('admin');

    // Approvals
    Route::patch('user/random/approval', 'ApprovalController@random')->name('users.random'); // Approve qty random users
    Route::patch('user/all/approval', 'ApprovalController@sync')->name('users.sync');
    Route::patch('user/{cid}/approval', 'ApprovalController@approve')->name('users.approve');
    Route::delete('user/{cid}/approval', 'ApprovalController@revoke')->name('users.revoke');

    // Discord Accounts
    Route::patch('user/{cid}/discord', 'DiscordAccountController@update')->name('users.discord');

    // Admin Users
    Route::patch('user/admin', 'AdminController@add')->name('admin.add');
    Route::delete('user/admin', 'AdminController@remove')->name('admin.remove');
});

// Discord Accounts
Route::get('discord/accounts', 'DiscordUsersAPIController');

//--------------------------------------------------------------------------
// Dataserver-NG
//--------------------------------------------------------------------------
Route::get('vatsim-data', function () {
    return response(Storage::get('vatsim-data.json'))->header('Content-Type', 'application/json');
});
//--------------------------------------------------------------------------
