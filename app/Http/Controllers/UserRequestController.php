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
        Approval::create(['user_id' => auth()->id()]);

        return redirect()->back()->withSuccess("Thanks for registering! <br /> We will send you an follow up email if you are invited to the beta.");
    }
}
