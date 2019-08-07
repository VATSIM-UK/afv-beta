<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\UserExpressedInterest;

class UserRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->has_request) {
            return redirect()->route('home')->withError(['Nope!', 'You already have a request to join the beta.']);
        }

        // create an approval which is pending
        $approval = Approval::create(['user_id' => auth()->id()]);

        event(new UserExpressedInterest($approval));

        return redirect()->route('home')->withSuccess(['Registration complete!', 'Your request has been saved.']);
    }
}
