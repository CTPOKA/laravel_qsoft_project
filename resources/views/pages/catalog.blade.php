<x-layouts.app page-title="Каталог" title="Каталог">
    <x-panels.header_navigation :menu="[]" />
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title ?? 'Каталог' }}</h1>

            <x-panels.catalog.filter class="my-4" method="get" />

            <x-panels.catalog.catalog :cars="$catalogData->cars" />

            <div class="text-center mt-4">
                {{ $catalogData->cars->onEachSide(1)->links() }}
            </div>
        </div>
    </main>
</x-layouts.app>