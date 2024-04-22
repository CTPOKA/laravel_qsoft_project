@props([
    'error' => null,
])
<select 
    @class([
        'block w-full mt-1 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class')
    ])
    {{ $attributes->except('class') }}
>
    {{ $slot }}
</select>