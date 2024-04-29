
<x-layouts.inner page-title="Салоны" title="Салоны">
<div class="space-y-4 max-w-4xl">
    @forelse ($salons as $salon)
        @if ($odd = ! ($odd ?? false))
            <div class="w-full flex p-4">
                <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                    <img src="{{ $salon->image }}" class="w-full h-full object-cover" alt="">
                </div>
                <x-panels.salon_item :salon="$salon" />
            </div>
        @else
            <div class="w-full flex justify-end bg-gray-100 p-4">
                <x-panels.salon_item :salon="$salon" />
                <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                    <img src="{{ $salon->image }}" class="w-full h-full object-cover" alt="">
                </div>
            </div>
        @endif
    @empty
        <div><p class="text-black text-xl">Данные временно недоступны</p></div>
    @endforelse
</div>
<div class="my-4 space-y-4 max-w-4xl">
    <hr>
    <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>
    <div class="bg-gray-200">
        Карта с салонами
    </div>
</div>
</x-layouts.inner>