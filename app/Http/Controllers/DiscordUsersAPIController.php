<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Discord_Account;

class DiscordUsersAPIController extends Controller
{
    public function __invoke(){
        $linked = Discord_Account::all();
        $output = [];

        foreach ($linked as $link) {
            $user = User::where('id', $link->user_id)->first();
            $name = ucwords(strtolower($user->full_name . ' - ' . $user->id));

            $approval = $user->approval;
            if (! $approval) $approved = false;
            else if ($approval->approved) $approved = true;
            else $approved = false;

            $output[$link->id] = ["display_name" => $name, "approved" => $approved];
        }

        return response($output)->header('Content-Type', 'application/json');
    }
}
