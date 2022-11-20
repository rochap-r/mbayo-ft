@component('mail::message')
    # Message des clients

    Un clients vous a laissé un message ci-déssous!

    Nom ou Entreprise: {{ $name }}

    Email: {{ $email }}

    Service: {{ $service }}

    Message: {{ $body }}

    Cordialement,
    {{ config('app.name') }}
@endcomponent
