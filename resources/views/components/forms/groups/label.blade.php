@props([
    'for',
])
<label for="{{ $for }}" {{ $attributes->merge(['class' => 'text-gray-700 font-bold']) }}>{{ $slot }}</label>