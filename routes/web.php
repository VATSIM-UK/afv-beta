<?php

// Landing/Main Page
Route::get('/', 'PageController@home')->name('home');

//--------------------------------------------------------------------------
// Guest Endpoint
//--------------------------------------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('login', 'Auth\LoginController@login')->name('auth.login');
    Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
    // Route::get('complete-login', 'Auth\LoginController@completeLogin')->name('auth.login.complete');
});

//--------------------------------------------------------------------------
// Authenticated Endpoint
//--------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('request', 'UserRequestController@store')->name('request');
    Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
});

//--------------------------------------------------------------------------
// Approved Users Endpoint
//--------------------------------------------------------------------------
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('knowledge-base', 'PageController@knowledgeBase')->name('knowledge_base');
    Route::get('clients/pilots/vpilot', 'PageController@vPilot')->name('pilots.vpilot');
    Route::get('clients/pilots/others', 'PageController@otherPilotClients')->name('pilots.others');
    Route::get('clients/atc/euroscope-client', 'PageController@euroscope')->name('atc.euroscope');
    Route::get('clients/atc/vrc-vstars-veram', 'PageController@vrc_vstars_veram')->name('atc.vrc_vstars_veram');
    Route::get('clients/atis/euroscope', 'PageController@euroscopeAtis')->name('atis.euroscope');
    Route::get('clients/atis/vatis', 'PageController@vatis')->name('atis.vatis');
    Route::get('issues', 'PageController@issues')->name('issues');

    Route::get('discord/login', 'DiscordOAuth2Controller@login')->name('discord.login');
    Route::get('discord/validate', 'DiscordOAuth2Controller@validateLogin');

    Route::get('prefile', 'FPLPrefileController@get')->name('prefile');
    Route::post('prefile', 'FPLPrefileController@post')->name('prefile.submit');

    Route::get('client-download', function () {
        return response()->download(storage_path('app/Audio For VATSIM.msi'));
    })->name('client.download');
});

//--------------------------------------------------------------------------
// Admin Endpoint
//--------------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
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
