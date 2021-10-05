<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;
    public function __construct(Array $mailDetails)
    {
        $this->setDetails($mailDetails);
    }

    public function setDetails(Array $details) {
        $this->details = $details;
    }

    public function build()
    {
        $this->subject($this->details['heading']);
        return $this->view('confirmMail', ['details' => $this->details]);
    }
}
