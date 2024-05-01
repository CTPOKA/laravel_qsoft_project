@props(['salons'])
<div>
    <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
    <span class="inline-block pl-1"> / <a href="{{ route('salons') }}" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
</div>
<div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
    @forelse ($salons as $salon)
        <div class="w-full flex">
            <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                <a class="block w-full h-full hover:opacity-75" href="{{ route('salons') }}"><img src="/assets/pictures/test_salon_1.jpg" class="w-full h-full object-cover" alt=""></a>
            </div>
            <div class="px-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <x-panels.salon_item :salon="$salon" :url="route('salons')" />
                </div>
            </div>
        </div>
    @empty
        <div><p class="text-black text-xl">Данные временно недоступны</p></div>
    @endforelse
</div>