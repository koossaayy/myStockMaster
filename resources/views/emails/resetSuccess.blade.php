@component('mail::message')

<h4>{{ __('You are changed your password successful.') }}</h4>
<span>{{ __('If you did change password, no further action is required.') }}</span>
<span>{{ __('If you did not change password, protect your account.') }}</span>

<span>{{ __('Regards,') }}<span><br>
{{ config('app.name') }}
@endcomponent
