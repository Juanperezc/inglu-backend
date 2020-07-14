<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPatient extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $name, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.patient.new');
    }
}
