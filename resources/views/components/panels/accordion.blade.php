@props(['active' => false])
<div class="block border-t clear-both w-full" data-accordion @if ($active) data-active @endif>
    <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
        <span>{{ $label }}</span>
        @if ($active)
            <x-icons.chevron-right class="text-orange h-6 w-6" data-accordion-active />
            <x-icons.chevron-down class="text-orange h-6 w-6" data-accordion-not-active style="display: none" />
        @else
            <x-icons.chevron-right class="text-orange h-6 w-6" data-accordion-active style="display: none"/>
            <x-icons.chevron-down class="text-orange h-6 w-6" data-accordion-not-active />
        @endif
    </div>
    <div class="my-4 px-4" data-accordion-details @if (! $active) style="display: none" @endif>
        {{ $slot }}
    </div>
</div>