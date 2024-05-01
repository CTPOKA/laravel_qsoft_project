<x-layouts.inner page-title="Все новости" title="Все новости">
    <x-slot:header-navigation>
        {{ Breadcrumbs::render('articles') }}
    </x-slot:header-navigation>
    <div class="space-y-4">
        @forelse ($articles as $article)
            <x-panels.articles.article_item :article="$article" />
        @empty
            <p class="p-4 italic text-xl">Нет новостей</p>
        @endforelse
    
        <div>
            <x-panels.pagination :paginator="$articles" />
        </div>
    </div>
</x-layouts.inner>