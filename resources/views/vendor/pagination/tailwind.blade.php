@if ($paginator->hasPages())
<nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">
    @if ($paginator->onFirstPage())
        <span class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
            <x-icons.chevron-filled-left class="h-6 w-6" />
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
            <x-icons.chevron-filled-left class="h-6 w-6" />
        </a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span aria-disabled="true">
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</span>
            </span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page">
                        <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">{{ $page }}</span>
                    </span>
                @else
                    <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach
    
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
            <x-icons.chevron-filled-right class="h-6 w-6" />
        </a>
    @else
        <span class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
            <x-icons.chevron-filled-right class="h-6 w-6" />
        </span>
    @endif
</nav>
@endif
