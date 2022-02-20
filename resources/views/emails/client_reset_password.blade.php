@component('mail::message')
    # Reset Account Password

    Welcome, {{ $data['data']->name }}

    Pin Code To Reset Password Is : {{ $data['data']->pin_code }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
