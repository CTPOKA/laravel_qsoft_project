@props([
    'for',
])
<div class="flex space-x-2 items-center" {{ $attributes }}>
    <x-forms.groups.label :for="$for" class="whitespace-nowrap">{{ $label }}</x-forms.groups.label>
    {{ $slot }}
</div>