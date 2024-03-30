<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CheckUnsubscribedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

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
     * @return int
     */
    

    protected $signature = 'users:check-unsubscribed';
    protected $description = 'Check unsubscribed users and delete accounts if unsubscribed for four consecutive days';

    public function handle()
    {
        // Get users who are not subscribed
        $users = User::where('sub_status', false)->get();

        foreach ($users as $user) {
            // Increment unsubscribed days if the user is unsubscribed
            if ($user->sub_status === false) {
                $user->unsubscribed_days++;
            }

            // If unsubscribed for seven consecutive days, delete the account
            if ($user->unsubscribed_days >= 7) {
                $user->delete();
                $this->info("User '{$user->email}' has been deleted due to being unsubscribed for seven consecutive days.");
            } else {
                $user->save(); // Save the updated unsubscribed_days count
            }
        }

        $this->info('Unsubscribed users checked successfully.');
    }
}
