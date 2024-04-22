<x-layouts.admin page-title="Управление новостями" title="Управление новостями">
    
    <section class="pb-4">
        <div class="my-6">
            <a href="{{ route('admin.cars.create') }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Добавить модель">
            <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Добавить модель</span>
            </span>
            </a>
        </div>

        <table class="border border-collapse w-full">
            <thead>
            <tr>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название модели</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена с учетом скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена без скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Новинка</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td class="border px-4 py-2">{{ $car->id }}</td>
                    <td class="border px-4 py-2">{{ $car->name }}</td>
                    <td class="border px-4 py-2"><x-price :price="$car->price" /></td>
                    <td class="border px-4 py-2"><x-price :price="$car->old_price" /></td>
                    <td class="border px-4 py-2">{{ $car->is_new ? 'Да' : 'Нет' }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center">
                            <a href="{{ route('admin.cars.edit', ['car' => $car]) }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Редактировать">
                                <x-icons.edit class="h-5 w-5" />
                            </a>
                        </div>
                    </td>
                    <td class="border px-4 py-2">
                        <form
                            class="flex items-center"
                            action="{{ route('admin.cars.destroy', ['car' => $car]) }}"
                            method="post"
                            onclick="return confirm('Вы уверены, что хотите удалить эту модель?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Удалить">
                                <x-icons.bucket class="h-5 w-5" />
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


