@props(['articles'])
<section class="news-block-inverse px-4 py-4">
    <div>
        <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
        <span class="inline-block text-gray-200 pl-1"> / <a href="{{route('articles')}}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
    </div>
    <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
        @forelse ($articles as $article)
            <x-panels.articles.footer_article_item :article="$article" />
        @empty
            <p class="p-4 italic text-xl">Нет новостей</p>
        @endforelse
    </div>
</section>
