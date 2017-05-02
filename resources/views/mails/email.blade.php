@component('mail::header')

    Reset Password

    @component('mail::message')

        # Restore Password!

        Restore Password Application:

        {{$email}}
        {{$token}}

        @component('mail::button', ['url' => $actionUrl])
        Reset Password
        @endcomponent


    @endcomponent