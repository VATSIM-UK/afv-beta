<?php

namespace App\Http\Controllers;

use Michelf\Markdown;

class GitIssuesController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, config('github.UserAgent'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/goliver1984/afv-issues/issues');
        $file = curl_exec($ch);
        curl_close($ch);
        if ($file) {
            $this->data = json_decode($file);
        }
    }

    public function getIssues()
    {
        $temp = [];
        foreach ($this->data as $issue) {
            if (empty($issue->milestone)) {
                continue;
            } // Issue has no milestone set
            // If not in the "Issues" milestone or already solved, ignore it
            if ($issue->milestone->number != 1 || $issue->state != 'open') {
                continue;
            }
            $body = str_replace("\r\n", '<br/>', $issue->body);
            $body = Markdown::defaultTransform($body);
            $body = str_replace(['<p>', '</p>'], '', $body);
            $temp[] = ['title' => $issue->title, 'body' => $body];
        }

        return $temp;
    }

    public function getKnowledgeBase()
    {
        $temp = [];
        foreach ($this->data as $knowledge) {
            if (empty($knowledge->milestone)) {
                continue;
            } // Issue has no milestone set
            // If not in the "KnowledgeBase" milestone or already solved, ignore it
            if ($knowledge->milestone->number != 2 || $knowledge->state != 'open') {
                continue;
            }
            $body = str_replace("\r\n", '<br/>', $knowledge->body);
            $body = Markdown::defaultTransform($body);
            $body = str_replace(['<p>', '</p>'], '', $body);
            $temp[] = ['title' => $knowledge->title, 'body' => $body];
        }

        return $temp;
    }
}
