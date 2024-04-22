@props([
    'multiple' => false,
    'error' => null,
])
<input
    type="file"
    @class([
        'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-300 focus:outline-none',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class')
    ])
    {{ $attributes->except('class', 'type') }}
    @if ($multiple)
        multiple="multiple"
    @endif
>