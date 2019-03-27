<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Events\UserExpressedInterest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return redirect('/')->withError('You have already made a request to signup to the beta.');
        }

        // create an approval which is pending
        $approval = Approval::create(['user_id' => auth()->id()]);

        event(new UserExpressedInterest($approval));

        return redirect()
            ->back()
            ->withSuccess(['Thanks For Registering!', 'If you are selected to take part in testing, we will send you an email. <br /> <br /> Come back here to check the progress of your registration.']);
    }
}
