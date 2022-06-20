<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected function scheduleTimezone()
    {
        return 'America/Chicago';
    }
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\DemoCron::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('create:generate-users')->everyMinute();
        $schedule->command('db:backup')->cron('0 * * * *')->sendOutputTo(storage_path() . "/app/log.txt")->withoutOverlapping()->when(function () {
            return true;
        })->before(function () {
            Log::info('before');
        })->after(function () {
            Log::info('after');
        })->onSuccess(function () {
            Log::info('command success');
        })->onFailure(function () {
            Log::info('Command Fail');
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
