<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Approval;
use App\Models\Discord_Account;

class AdminPageController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['approved'] = Approval::approved()->orderBy('user_id', 'ASC')->get();
        $data['pending'] = Approval::pending()->orderBy('user_id', 'ASC')->get();

        $discord_accs = Discord_Account::orderBy('user_id', 'ASC')->get();

        $discord = [];
        $discord['linked'] = [];
        $discord['unlinked'] = [];

        foreach ($discord_accs as $account) {
            $user = User::where('id', $account->user_id)->first();
            $discord['linked'][] = ['cid' => $user->id, 'name' => $user->full_name, 'id' => $account->id];
        }

        return view('admin.main')->withApprovals($data)->withDiscord($discord);
    }
}
