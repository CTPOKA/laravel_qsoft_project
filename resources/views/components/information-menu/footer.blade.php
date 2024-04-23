<p class="text-3xl text-black font-bold mb-4">Информация</p>
<nav>
    <ul class="bullet-list-item">
        @foreach ($menu as $item)
            <li><a class="@if (request()->routeIs($item['route'])) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{route($item['route'])}}">{{ $item['title'] }}</a></li>
        @endforeach
    </ul>
</nav>