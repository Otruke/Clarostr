<?php

namespace App\Console\Commands;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Console\Command;

class UpdateUserSubStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user:sub-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if next-billing date equals to now and return substatus to zero else remain true';

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
    public function handle()
    {
        // Find users with next billing date in the past and active subscription
        $usersToUpdate = User::where('next_billing', '<=', Carbon::now())
                            ->where('sub_status', 1)
                            ->get();

        // Update sub_status to false for those users
        foreach ($usersToUpdate as $user) {
            $user->update(['sub_status' => false]);
        }
        $this->info('users sub-status checked successfully.');
    }
}
