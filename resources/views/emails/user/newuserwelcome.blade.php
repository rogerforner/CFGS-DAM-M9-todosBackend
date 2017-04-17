@component('mail::message')
# Benvingut/da a la App todosBackend.

Hola {{ $user->name }},<br>
todosBackend es tracta d'una **activitat** de 2DAM, curs 2016-17, de l'institut de l'Ebre.

@component('mail::button', ['url' => 'http://acacha.org/mediawiki/2DAM_2016-17/todos#.WPUu_9-YFqM'])
Acacha: Alumnes
@endcomponent

Molt atentament,<br>
Roger Forner Fabre
{{-- config('app.name') --}}
@endcomponent
