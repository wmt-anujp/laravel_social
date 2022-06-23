<?php

namespace App\Jobs;

use App\Mail\upadteMail;
use App\Models\User\User;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendEmailJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $failOnTimeout = true;
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function retryUntil()
    {
        return now()->addMinutes(10);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $this->release();
        Mail::to($this->user->email)->send(new upadteMail($this->user));
    }

    // public function failed(Throwable $exception)
    // {
    // }
}
