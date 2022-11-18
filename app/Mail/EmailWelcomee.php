<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailWelcomee extends Mailable
{
    use Queueable, SerializesModels;
    public $empleado;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.emailwelcomee')
                     ->from('cronos@cronos.com','Cronos')
                     ->subject('Bienvenidos a Cronos')  ;
    }
}
