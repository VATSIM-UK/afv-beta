<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\UserApproved;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        if ($user->approval == null) {
            return redirect('/')->withError('User not found.');
        }

        $approval = $user->approval->setAsApproved();

        event(new UserApproved($approval));

        return redirect('/')->withSuccess('User(s) successfully approved!');
    }
}
