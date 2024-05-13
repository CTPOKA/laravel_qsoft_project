<x-layouts.admin page-title="Управление новостями" title="Управление новостями">
    
    <section class="pb-4">
        <div class="my-6">
            <a href="{{ route('admin.articles.create') }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Добавить новость">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Добавить новость</span>
            </span>
            </a>
        </div>
    
        <table class="border border-collapse w-full">
            <thead>
            <tr>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название новости</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Краткое описание</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Дата публикации</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Теги</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
            <tr>
                <td class="border px-4 py-2">{{ $article->id }}</td>
                <td class="border px-4 py-2">{{ $article->title }}</td>
                <td class="border px-4 py-2">{{ $article->description }}</td>
                <td class="border px-4 py-2">{{ $article->published_at }}</td>
                <td class="border px-4 py-2">{{ $article->tags->pluck('name')->implode(', ') }}</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center">
                        <a href="{{ route('admin.articles.edit', ['article' => $article]) }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Редактировать">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </td>
                <td class="border px-4 py-2">
                    <form
                        class="flex items-center"
                        action="{{ route('admin.articles.destroy', ['article' => $article]) }}"
                        method="post"
                        onclick="return confirm('Вы уверены, что хотите удалить эту новость?')"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Удалить">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    
        <div class="text-center mt-4">
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
    </section>
</x-layouts.admin>