<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DevisMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Elements de devis
     * @var array
     */
    public $devis;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $devis)
    {
        $this->devis = $devis;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Demande de dévis")
            ->view("emails.contact.devis");
    }
}
