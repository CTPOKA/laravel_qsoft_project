@props([
    'value' => null,
])
@if ($value)
    <div class="flex items-center justify-center border rounded mb-2">
        <img src="{{ $value }}" class="max-w-full max-h-60">
    </div>
@endif

<x-forms.inputs.file
    {{ $attributes->except('multiple') }}
    :multiple="false"
/>