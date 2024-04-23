@props([
    'for',
    'error' => null,
])
<x-forms.row {{ $attributes }}>
    <x-forms.groups.label :for="$for">{{ $label }}</x-forms.groups.label>
    <div class="mt-1">
        {{ $slot }}
    </div>
    @if (! empty($error))
        <span class="text-xs italic text-red-600">{{ $error }}</span>
    @endif
</x-forms.row>