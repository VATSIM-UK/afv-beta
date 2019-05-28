<?php

namespace App\Console\Commands;

use App\Mail\BetaUpdate;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class SendUpdateEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the beta update email to all recipients.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user)->queue(new BetaUpdate());
        }
    }
}
