<?php

namespace App\Http\Controllers;

/**
 * This controller handles authenticating users for the application and
 * redirecting them to your home screen. The controller uses a trait
 * to conveniently provide its functionality to your applications.
 */
class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function knowledgeBase()
    {
        $knowledgeBase = (new GitIssuesController)->getKnowledgeBase();
        return view('sections.knowledgeBase')->withKnowledgeBase($knowledgeBase);
    }

    public function euroscope()
    {
        return view('sections.atc.euroscope');
    }

    public function vrc_vstars_veram()
    {
        return view('sections.atc.vrc_vstars_veram');
    }

    public function vPilot()
    {
        return view('sections.pilots.vpilot');
    }

    public function otherPilotClients()
    {
        return view('sections.pilots.others');
    }

    public function euroscopeAtis()
    {
        return view('sections.atis.euroscope');
    }

    public function vatis()
    {
        return view('sections.atis.vatis');
    }

    public function issues()
    {
        $issues = (new GitIssuesController)->getIssues();
        return view('sections.issues')->withIssues($issues);
    }
}
