@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="hover:text-orange">
                    {{ $breadcrumb->title }}
                </a>
            @else
                <span>
                    {{ $breadcrumb->title }}
                </span>
            @endif

            @unless($loop->last)
                <x-icons.chevron-right class="inline-block h-3 w-3 mx-1" />
            @endif

        @endforeach
    </nav>
@endunless
