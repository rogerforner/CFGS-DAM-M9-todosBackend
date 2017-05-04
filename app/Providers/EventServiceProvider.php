<?php

namespace RogerForner\TodosBackend\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Registered' => [
            'RogerForner\TodosBackend\Listeners\UserRegistered',
        ],
        //Amb aquest esdevinemnt ens interessa escoltar si un usuari s'ha creat i, si és així, enviar-li un correu.
        'RogerForner\TodosBackend\Events\NewUser' => [
            'RogerForner\TodosBackend\SendWelcomeEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
