<?php

namespace App\Listeners;

use App\Events\Welcomeapp;
use App\Mail\EmailWelcomee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    
    }
    
   
    /**
     * Handle the event.
     *
     * @param  \App\Events\Welcomeapp  $event
     * @return void
     */
    public function handle(Welcomeapp $event): void
    {
        Mail::to($event->empleado->email)->send(
            new EmailWelcomee($event->empleado)
        );
    }
}
