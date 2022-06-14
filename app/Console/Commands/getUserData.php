<?php

namespace App\Console\Commands;

use App\Models\User\User;
use Illuminate\Console\Command;

class getUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getUserData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will display all users data';

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
        // $this->table(
        //     ['Name', 'Email', 'Username', 'Profile'],
        //     User::all(['name', 'email', 'username', 'profile_photo'])
        // );
        // $users = $this->withProgressBar(User::all(), function ($user) {
        //     $this->performTask($user);
        // });
        // echo $users;
        $users = User::all();
        $bar = $this->output->createProgressBar(count($users));

        $bar->start();

        foreach ($users as $user) {
            $this->performTask($user);
            $bar->advance();
        }
        $bar->finish();
    }
}
