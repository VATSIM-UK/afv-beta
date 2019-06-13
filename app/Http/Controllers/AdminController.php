<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $cid = $request->input('id', '');
        if (strlen($cid) <= 0) {
            return redirect()->back()->withError('User invalid');
        }

        if (! User::where('id', $cid)->exists()) {
            return redirect()->back()->withError("User doesn't exist");
        }

        $user = User::where('id', $cid)->first();
        $user->admin = true;
        $user->save();

        return redirect()->back()->withSuccess('User approved as admin');
    }

    public function remove(Request $request)
    {
        $cid = $request->input('id', '');
        if (strlen($cid) <= 0) {
            return redirect()->back()->withError('User invalid');
        }

        if (! User::where('id', $cid)->exists()) {
            return redirect()->back()->withError("User doesn't exist");
        }

        $user = User::where('id', $cid)->first();
        $user->admin = false;
        $user->save();

        return redirect()->back()->withSuccess('User revoked as admin');
    }
}
