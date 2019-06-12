<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Approve a new user.
     *
     * @param $cid CID to approve
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function approve($cid, Request $request)
    {
        $approval = Approval::pending()->where('user_id', $cid); // See if user has a pending approval

        if ($approval == null) { // If user hasn't got a pending approval
             $approval = Approval::where('user_id', $cid); // See if user has any approval (pending or not)
             if (! $approval) {
                 return redirect()->back()->withError('User not found.')->withApprove('');
             } // User not found
            else {
                return redirect()->back()->withError('User is already approved.')->withApprove('');
            } // Can't approve an alreay approved user
        } else {
            $approval = $approval->first();
        } // Get the approval

        $afvAuth = new AFVAuthController();
        $afvAuth = $afvAuth->approveCID($cid);
        if ($afvAuth !== TRUE){
            return redirect()->back()->withError($afvAuth['message'])->withApprove('');
        }

        $approval->setAsApproved();

        return redirect()->back()->withSuccess('User successfully approved!')->withApprove('');
    }

    /**
     * Revoke a user's approval.
     *
     * @param $cid CID to revoke
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function revoke($cid, Request $request)
    {
        $approval = Approval::approved()->where('user_id', $cid); // See if user is approved

        if ($approval == null) { // If user is not approved
             $approval = Approval::where('user_id', $cid); // See if it exists
             if (! $approval) {
                 return redirect()->back()->withError('User not found.');
             } // User not found
            else {
                return redirect()->back()->withError('User is not approved.');
            } // Can't revoke a non-approved user
        } else {
            $approval = $approval->first();
        } // Get the approval

        $afvAuth = new AFVAuthController();
        $afvAuth = $afvAuth->revokeCID($cid);
        if ($afvAuth !== TRUE){
            return redirect()->back()->withError($afvAuth['code'] . ' - ' . $afvAuth['message']);
        }

        $approval->setAsPending();

        return redirect()->back()->withSuccess('User approval revoked!');
    }

    /**
     * Approves qty random users.
     *
     * @param $qty Quantity of random users to approve
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function random(Request $request)
    {
        $qty = $request->input('qty', 0);
        if (! $qty) {
            return redirect()->back()->withApprove('');
        }

        $pending = Approval::pending()->take($request->input('qty', 0))->inRandomOrder()->get();

        // No approvals pending
        if (! $pending->count()) {
            return redirect()->back()->withError('No pending approvals')->withApprove('');
        }

        $approved = 0;
        foreach ($pending as $approval) {
            if (! $approval->user) {
                continue;
            } // If it doesn't belong to any user, it will fail when trying to find who to send mail to
            
            $afvAuth = new AFVAuthController();
            $afvAuth = $afvAuth->approveCID($cid);
            if ($afvAuth !== TRUE){
                continue;
            }
            
            $approval->setAsApproved();
            ++$approved;
        }

        return redirect()->back()->withSuccess("Successfully approved $approved users")->withApprove('');
    }


    public function sync(){
        $afvAuth = new AFVAuthController();
        $afvAuth = $afvAuth->syncApprovals();
        if ($afvAuth !== TRUE){
            return redirect()->back()->withError($afvAuth['code'] . ' - ' . $afvAuth['message']);
        }
        return redirect()->back()->withSuccess("Users successfully submitted");
    }
}
