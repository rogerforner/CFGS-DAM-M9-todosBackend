<?php

namespace RogerFornerTodosBackend;

use RogerFornerTodosBackend\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use RogerFornerTodosBackend\Mail\NewUserWelcome;
use Mail;

class SendWelcomeEmail
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        //to() A qui va dirigit. Ens interessa l'usuari que ha estat creat. Usuari que captem gràcies a l'Esdeveniment
        //on, si ens dirigim al fitxer correpsonent Event/NewUser.php, veurem que el fem public per poder-lo passar
        //al listener de l'objecte. L'event en tenim en la variable $event.
        //$event->user Capturem l'objecte usuari de l'esdeviment i n'obtenim l'email ->email d'aquest.
        //Amb send() definim el que volem enviar amb el email, que en aquest cas aprofitem la vista que ha tenim creada
        //emails/user/newuserwelcome.blade.php.
        //Amb "new NewUserWelcome()" referenciem la vista però el new el posem perquè es tracta de crear un nou objecte
        //cada cop que duguem a terme l'esdeveniment, quan es crea un usuari.
        //I afegim $event->user a NewUserWelcom per poder tenir accès a aquest, sobretot és interessant si ens interessa
        //que l'usuari pugui personalitzar el correu.
        Mail::to($event->user->email)->send(new NewUserWelcome($event->user));
    }
}
