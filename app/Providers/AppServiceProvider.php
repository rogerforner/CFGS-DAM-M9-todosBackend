<?php

namespace RogerFornerTodosBackend\Providers;

use RogerFornerTodosBackend\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        User::created(function ($user) {
//            $user->assignRole('admin');
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
