@props([
    'salon',
    'url' => null,
])
<div class="px-4 flex flex-col justify-between leading-normal text-right">
    <div class="mb-8">
        <div class="text-black font-bold text-xl mb-2">
            @if ($url !== null)
                <a class="hover:text-orange" href="{{ route('salons') }}">{{ $salon->name }}</a>
            @else
                {{ $salon->name }}
            @endif
        </div>
        <div class="text-base space-y-2">
            <p class="text-gray-400">{{ $salon->address }}</p>
            <p class="text-black">{{ $salon->phone }}</p>
            <p class="text-sm">Часы работы:<br>{{ $salon->work_hours }}</p>
        </div>
    </div>
</div>