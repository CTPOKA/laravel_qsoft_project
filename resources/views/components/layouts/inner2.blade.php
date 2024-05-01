<x-layouts.app page-title="{{ $pageTitle ?? null }}">
    <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
    {{ $navigation ?? null }}
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            <x-panels.messages.flashes />
            {{ $slot }}
        </div>
    </main>
</x-layouts.app>