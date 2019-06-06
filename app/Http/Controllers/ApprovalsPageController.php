<?php

namespace App\Http\Controllers;

use App\Models\Approval;

class ApprovalsPageController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['approved'] = Approval::approved()->orderBy('user_id', 'ASC')->get();
        $data['pending'] = Approval::pending()->orderBy('user_id', 'ASC')->get();

        return view('admin.approvals')->withApprovals($data);
    }
}
