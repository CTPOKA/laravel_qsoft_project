<x-layouts.inner2 page-title="Личный кабинет" title="Личный кабинет">
    <x-slot:navigation>
        {{ Breadcrumbs::render('inner', 'Личный кабинет') }}
    </x-slot:navigation>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-black text-xl font-bold mb-4">Список заказов</h2>
        <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold">
                            Номер заказа
                        </th>
                        <th scope="col" class="px-6 py-3 font-bold">
                            Товаров в заказе
                        </th>
                        <th scope="col" class="px-6 py-3 font-bold">
                            Общая стоимость
                        </th>
                        <th scope="col" class="px-6 py-3 font-bold">
                            Статус оплаты
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $order->id }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $order->count }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $order->total_cost }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div @class([
                                        'h-2.5 w-2.5 rounded-full mr-2',
                                        'bg-red-500' => $order->status == 'Ошибка оплаты',
                                        'bg-orange' => $order->status == 'Не оплачен',
                                        'bg-green-500' => $order->status == 'Оплачен',
                                    ]) class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2">
                                    </div> {{ $order->status }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--                <span class="text-black text-xl text-center mb-4">У вас нет заказов</span>-->
        <!--                <div class="mt-4">-->
        <!--                    <a class="inline-flex items-center text-orange hover:opacity-75" href="catalog.html">-->
        <!--                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
        <!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />-->
        <!--                        </svg>-->
        <!--                        К каталогу-->
        <!--                    </a>-->
        <!--                </div>-->
    </div>

</x-layouts.inner2>
