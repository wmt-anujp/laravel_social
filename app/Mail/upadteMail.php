<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class upadteMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $updateData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($updateData)
    {
        $this->updateData = $updateData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com', 'Admin')
            ->subject('Account Info Updated')
            ->markdown('emails.update')
            ->with(['updateData' => $this->updateData]);
    }
}
