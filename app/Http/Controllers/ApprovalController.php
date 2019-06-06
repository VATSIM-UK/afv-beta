<?php

namespace App\Http\Controllers;

use App\Models\Approval;
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
     * Revoke a user's approval
     *
     * @param $cid CID to revoke
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
     public function revoke($cid, Request $request)
     {
         $approval = Approval::approved()->where('user_id', $cid); // See if user is approved
 
         if ($approval == null){ // If user is not approved
             $approval = Approval::where('user_id', $cid); // See if it exists
             if (! $approval) return redirect()->back()->withError('User not found.'); // User not found
             else return redirect()->back()->withError('User is not approved.'); // Can't revoke a non-approved user
         }
         else $approval = $approval->first(); // Get the approval
 
         $approval->setAsPending();
 
         return redirect()->back()->withSuccess('User approval revoked!');
     }


    /**
     * Approve a new user
     *
     * @param $cid CID to approve
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function approve($cid, Request $request)
    {
        $approval = Approval::pending()->where('user_id', $cid); // See if user has a pending approval

        if ($approval == null){ // If user hasn't got a pending approval
            $approval = Approval::where('user_id', $cid); // See if user has any approval (pending or not)
            if (! $approval) return redirect()->back()->withError('User not found.')->withApprove(''); // User not found
            else return redirect()->back()->withError('User is already approved.')->withApprove(''); // Can't approve an alreay approved user
        }
        else $approval = $approval->first(); // Get the approval

        $approval->setAsApproved();

        return redirect()->back()->withSuccess('User successfully approved!')->withApprove('');
    }
}
