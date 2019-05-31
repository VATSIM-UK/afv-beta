<?php

namespace App\Http\Controllers;

class GitIssuesController extends Controller
{
    public static function getIssues()
    {
        $output = [
            'issues' => [],
            'knowledge_base' => [],
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, config('github.UserAgent'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/goliver1984/afv-issues/issues');
        $file = curl_exec($ch);
        curl_close($ch);

        if (! $file) {
            return $output;
        }

        $issues = json_decode($file);
        if (! $issues) {
            return $output;
        }

        foreach ($issues as $issue) {
            if (empty($issue->milestone)) {
                continue;
            } // Issue has no milestone set

            $open = ($issue->state == 'open') ? true : false;

            if ($issue->milestone->number == 2) { // Knowledge base milestone
                $output['knowledge_base'][] = ['title' => $issue->title, 'body' => $issue->body, 'open' => $open];
            } elseif ($issue->milestone->number == 1) { // Known Issues
                $output['issues'][] = ['title' => $issue->title, 'body' => $issue->body, 'open' => $open];
            }
        }

        return $output;
    }
}
