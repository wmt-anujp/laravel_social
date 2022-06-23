<?php

namespace App\Observers;

use App\Jobs\SendEmailJob;
use App\Jobs\tempJob;
use App\Mail\signupMail;
use App\Mail\upadteMail;
use App\Models\User\User;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Log::info('New User created');
        // dd($user);
        Mail::to($user->email)->send(new signupMail($user));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        Log::info('User data updated');
        SendEmailJob::dispatch($user);
        // SendEmailJob::dispatch($user)->delay(now()->addMinutes(5));
        // SendEmailJob::dispatchAfterResponse($user);
        // SendEmailJob::dispatch($user)->onQueue('processing');

        // Bus::chain([
        //     new SendEmailJob($user),
        // ])->catch(function (\Exception $exception) {
        //     dd($exception);
        // })->dispatch();

        // Mail::to($user->email)->send(new upadteMail($user));
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
