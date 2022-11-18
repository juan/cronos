<?php

namespace App\Listeners;

use App\Events\ChangeEmail;
use App\Mail\EmailChange;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailChange
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ChangeEmail  $event
     * @return void
     */
    public function handle(ChangeEmail $event): void
    {
        Mail::to($event->user->email)->send(
            new EmailChange($event->user)
        );
    }
}
