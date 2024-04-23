@props([
    'checked' => false,
    'error' => null,
])
<input
type="checkbox"
    @class([
        'rounded text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class')
    ])
    {{ $attributes->except('class', 'type', 'checked') }}
    @checked($checked)
>