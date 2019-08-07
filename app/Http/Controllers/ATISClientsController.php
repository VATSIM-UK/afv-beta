<?php

namespace App\Http\Controllers;

class ATISClientsController extends Controller
{
    public function euroscope()
    {
        return view('sections.atis.euroscope');
    }

    public function vatis()
    {
        return view('sections.atis.vatis');
    }
}
