@component('mail::message')
# Message de visiteurs

Un visiteur vous a laissé un message ci-déssous!

Nom : {{ $name }}
<br>
Email: {{ $email }}

Sujet: {{ $subject }}

Message: {{ $body }}

Cordialement,
{{ config('app.name') }}
@endcomponent
