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
        return view('landing')->with('success', 'Test');
    }
}
