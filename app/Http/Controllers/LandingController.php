<?php

namespace App\Http\Controllers;

/**
 * This controller handles authenticating users for the application and
 * redirecting them to your home screen. The controller uses a trait
 * to conveniently provide its functionality to your applications.
 */
class LandingController extends Controller
{
    public function __invoke()
    {
        if(!auth()->user()) return view('landing');

        if (auth()->user()->approved)
            return view('landing')->withIssues(GitIssuesController::getIssues());
        else
            return view('landing');
    }
}
