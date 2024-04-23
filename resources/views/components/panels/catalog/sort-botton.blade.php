<input type="hidden" name="{{ $name }}" value="{{ $currentValue }}">
<button
    name="{{ $name }}"
    value="{{ $nextValue }}"
    @class([
        'flex items-center cursor-pointer hover:no-underline hover:text-opacity-70 outline-none focus:outline-none',
        'hover:text-orange' => ! $currentValue,
        'text-orange underline' => $currentValue,
    ])
>
{{ $slot }}
@if ($showAscIcon())
    <x-icons.arrow-up class="h-4 w-4" />
@endif
@if ($showDescIcon())
    <x-icons.arrow-down class="h-4 w-4" />
@endif
</button>