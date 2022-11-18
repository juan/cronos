<?php

namespace App\Providers;

use App\Events\ChangeEmail;
use App\Events\Welcomeapp;
use App\Listeners\SendEmailChange;
use App\Listeners\SendWelcomeEmail;
use App\Models\User;
use App\Observers\EmpleadoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Welcomeapp::class =>[
            SendWelcomeEmail::class
        ],
        ChangeEmail::class=>[
          SendEmailChange::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(EmpleadoObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
