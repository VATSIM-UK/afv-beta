<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discord_Account;

class DiscordUsersAPIController extends Controller
{
    public function __invoke()
    {
        $linked = Discord_Account::all();
        $output = [];

        foreach ($linked as $link) {
            $user = User::where('id', $link->user_id)->first();
            $name = mb_convert_case(mb_strtolower($user->full_name.' - '.$user->id), MB_CASE_TITLE, 'UTF-8');

            $approval = $user->approval;
            if (! $approval) {
                $approved = false;
            } elseif ($approval->approved) {
                $approved = true;
            } else {
                $approved = false;
            }

            $output[$link->id] = ['display_name' => $name, 'approved' => $approved];
        }

        return response($output)->header('Content-Type', 'application/json');
    }
}
