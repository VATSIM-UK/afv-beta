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

        return redirect()->back()->withSuccess(['Thanks For Registering!', 'If you are selected to take part in testing, we will send you an email. <br /> <br /> Come back here to check the progress of your registration.']);
    }
}
