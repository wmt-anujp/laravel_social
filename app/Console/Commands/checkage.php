<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class checkage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkAge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For checking user age';

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
        if ($this->confirm('Are you 18+?')) {
        }
    }
}
