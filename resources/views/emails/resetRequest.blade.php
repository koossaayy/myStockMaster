@component('mail::message')

<span>{{ __('You are receiving this email because we received a password reset request for your account.') }}</span>

@component('mail::button', ['url' => $url])
{{ __('Reset Password') }}
@endcomponent

<span>{{ __('If you did not request a password reset, no further action is required.') }}</span>

<span>{{ __('Regards,') }}<span><br>
{{ config('app.name') }}
@endcomponent
