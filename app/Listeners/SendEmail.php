<?php

namespace App\Listeners;

use App\Events\UserloggedIn;
use App\Jobs\SendEmailJob;
use App\Mail\loginMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // protected $someData;
    public function __construct()
    {
        // $this->someData = $mailData;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserloggedIn  $event
     * @return void
     */
    public function handle(UserloggedIn $event)
    {
        Log::info('User logged into instagram');
        // dispatch(new SendEmailJob($event));
        // Mail::to($event->mailData->email)->send(new loginMail($event));
    }
}
