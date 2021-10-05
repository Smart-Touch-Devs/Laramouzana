<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterventionMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Elements de intervention
     * @var array
     */
    public $intervention;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $intervention)
    {
        $this->intervention = $intervention;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Demande d'intervention")
            ->view("emails.contact.intervention");
    }
}