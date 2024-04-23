<x-layouts.app page-title="{{ $pageTitle ?? null }}" footer-navigation="">
    <x-slot:menu>
        <x-panels.admin.navigation_menu />
    </x-slot:menu>
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            <x-panels.messages.flashes />
            {{ $slot }}
        </div>
    </main>
</x-layouts.app>