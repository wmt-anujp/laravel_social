<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:generate-users {usercount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds dummy user data in DB';

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
        // $userData = $this->argument('usercount');
        // for ($i = 0; $i < $userData; $i++) {
        //     User::factory()->create();
        // }
        Log::info("message");
    }
}
