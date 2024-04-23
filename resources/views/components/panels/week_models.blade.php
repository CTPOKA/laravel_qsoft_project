@props(['cars'])
<section class="pb-4 px-4">
    @if (! empty($cars))
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <x-panels.catalog.catalog :cars="$cars" />
    @endif
</section>