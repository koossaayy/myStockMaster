@props(['color' => 'transparent'])

<x-button.link color="{{ $color }}" href="{{ url()->previous() }}" title="{{ __('Go back') }}" {{ $attributes }}>
    <i class="bi bi-arrow-left"></i>
    <span>{{__('Back')}}</span>
</x-button.link>
