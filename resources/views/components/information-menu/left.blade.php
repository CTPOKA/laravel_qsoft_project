<nav>
    <ul class="text-sm">
        <li>
            <p class="text-xl text-black font-bold mb-4">Информация</p>
            <ul class="space-y-2">
                @foreach ($menu as $item)
                    <li><a class="@if (request()->routeIs($item['route'])) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{route($item['route'])}}">{{ $item['title'] }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>