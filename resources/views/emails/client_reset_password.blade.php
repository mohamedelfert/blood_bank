@component('mail::message')
    # Reset Account Password

    Welcome, {{ $client->name }}

    Pin Code To Reset Password Is : {{ $client->pin_code }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
