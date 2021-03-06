<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model'  => RogerFornerTodosBackend\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'onesignal' => [
        'app_id' => env('ONESIGNAL_APP_ID'),
        'rest_api_key' => env('ONESIGNAL_REST_API_KEY')
    ],
    'telegram-bot-api' => [
        'token' => env('TELEGRAM_BOT_TOKEN', 'YOUR BOT TOKEN HERE')
    ],

    /*
    | Acacha Llum services...
    |
    | See: https://github.com/acacha/llum
    |
    */
    #llum_services

    'github' => [
        'client_id' => env('GITHUB_OAUTH_APP_ID'),
        'client_secret' => env('GITHUB_OAUTH_APP_SECRET'),
        'redirect' => env('GITHUB_OAUTH_APP_REDIRECT_URL'),
    ],

    'twitter' => [
        'client_id' => env('TWITTER_OAUTH_APP_ID'),
        'client_secret' => env('TWITTER_OAUTH_APP_SECRET'),
        'redirect' => env('TWITTER_OAUTH_APP_REDIRECT_URL'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_OAUTH_APP_ID'),
        'client_secret' => env('GOOGLE_OAUTH_APP_SECRET'),
        'redirect' => env('GOOGLE_OAUTH_APP_REDIRECT_URL'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_OAUTH_APP_ID'),
        'client_secret' => env('FACEBOOK_OAUTH_APP_SECRET'),
        'redirect' => env('FACEBOOK_OAUTH_APP_REDIRECT_URL'),
    ],


    /*
    | Acacha Llum services...
    |
    | See: https://github.com/acacha/llum
    |
    */
    //llum_services


];
