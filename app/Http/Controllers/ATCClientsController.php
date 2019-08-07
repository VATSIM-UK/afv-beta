<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ATCClientsController extends Controller
{
    public function euroscope()
    {
        return view('sections.atc.euroscope');
    }

    public function vrc_vstars_veram()
    {
        return view('sections.atc.vrc_vstars_veram');
    }
}
