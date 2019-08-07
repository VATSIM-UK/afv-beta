<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PilotClientsController extends Controller
{
    public function vPilot()
    {
        return view('sections.pilots.vpilot');
    }

    public function others()
    {
        return view('sections.pilots.others');
    }
}
