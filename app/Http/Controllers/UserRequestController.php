<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->has_request) {
            return redirect('/')->withError('You have already made a request to signup to the beta.');
        }
        // create an approval which is pending
        Approval::create(['user_id' => auth()->id()]);

        return redirect()->back()->withSuccess("Thanks for registering! <br /> We will send you an follow up email if you are invited to the beta.");
    }
}
