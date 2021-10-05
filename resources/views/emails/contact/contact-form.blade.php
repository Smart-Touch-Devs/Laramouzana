@component('mail::message')
# Bonjour

Vous avew recu un message de la part de {{$contact['name']}}({{$contact['email']}})

Message{{$contact['message']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
