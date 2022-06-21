<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class loginMail extends Mailable
{
    use Queueable, SerializesModels;
    public $loginData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($loginData)
    {
        // dd($loginData);
        $this->loginData = $loginData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com', 'Admin')
            ->subject('New Login Device Found')
            ->markdown('emails.loginEmail')
            ->with(['loginData' => $this->loginData]);
    }
}
