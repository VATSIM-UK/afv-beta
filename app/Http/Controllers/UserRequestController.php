<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create an approval which is pending
        $approval = Approval::create(['user_id' => auth()->id()]);

        $name = auth()->user()->name_first;

        return redirect('/')->withSuccess("Thank you for registering your interest,
                                $name!  We will be in touch shortly.");
    }
}
