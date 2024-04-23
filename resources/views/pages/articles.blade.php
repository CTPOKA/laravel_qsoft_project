<x-layouts.inner page-title="Все новости" title="Все новости">
    <div class="space-y-4">
        @forelse ($articles->slice(0, 3) as $article)
            <x-panels.articles.article_item :article="$article" />
        @empty
            <p class="p-4 italic text-xl">Нет новостей</p>
        @endforelse
    
        <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg" aria-label="Pagination">
                <a href="#" class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">1</span>
                <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">2</a>
                <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">3</a>
                <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">...</a>
                <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white">10</a>
                <a href="#" class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</x-layouts.inner>