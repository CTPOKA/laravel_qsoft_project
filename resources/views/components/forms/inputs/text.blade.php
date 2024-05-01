@props([
    'value' => null,
    'error' => null,
    'type' => 'text',
])
<input
    type="{{ $type }}"
    @class([
        'block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class')
    ])
    {{ $attributes->except('class', 'type') }}
    value="{{ $value }}"
>