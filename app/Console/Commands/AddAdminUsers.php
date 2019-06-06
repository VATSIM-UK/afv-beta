<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddAdminUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:set {cid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets users as admin';

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
        $cid = $this->argument('cid');
        $user = User::where('id', $cid);

        if ($user == null) {
            echo 'User not found';

            return;
        }

        $user = $user->first();

        $user->admin = true;
        $user->save();

        echo "$user->full_name can now manage approvals";
    }
}
