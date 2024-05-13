<x-layouts.inner2 page-title="Корзина" title="Корзина">

    <x-slot:navigation>
        {{ Breadcrumbs::render('inner', 'Корзина') }}
    </x-slot:navigation>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>
                @forelse ($baskets as $basket)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-32 p-4">
                            <a class="hover:opacity-75" href="{{ route('products', $basket->car) }}">
                                <img src="{{ $basket->car->imageUrl }}" alt="">
                            </a>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <a class="hover:text-orange" href="{{ route('products', $basket->car) }}">
                                {{ $basket->car->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form data-basket data-id="{{ $basket->car->id }}" class="flex items-center space-x-3">
                                @csrf

                                <button type="submit" data-basket-decrement
                                    class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <span class="sr-only">Quantity button</span>
                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div>
                                    <input type="number" value="{{ $basket->count }}" name="product_count" min="1"
                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="1" required>
                                </div>
                                <button type="submit" data-basket-increment
                                    class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    <span class="sr-only">Quantity button</span>
                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <x-price :price="$basket->car->price" />
                        </td>
                        <td class="px-6 py-4">
                            <form method="post" action="{{ route('basket.destroy', ['basket' => $basket->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482.428 482.429">
                                        <path
                                            d="M381.163,57.799h-75.094C302.323,25.316,274.686,0,241.214,0c-33.471,0-61.104,25.315-64.85,57.799h-75.098 c-30.39,0-55.111,24.728-55.111,55.117v2.828c0,23.223,14.46,43.1,34.83,51.199v260.369c0,30.39,24.724,55.117,55.112,55.117 h210.236c30.389,0,55.111-24.729,55.111-55.117V166.944c20.369-8.1,34.83-27.977,34.83-51.199v-2.828 C436.274,82.527,411.551,57.799,381.163,57.799z M241.214,26.139c19.037,0,34.927,13.645,38.443,31.66h-76.879 C206.293,39.783,222.184,26.139,241.214,26.139z M375.305,427.312c0,15.978-13,28.979-28.973,28.979H136.096 c-15.973,0-28.973-13.002-28.973-28.979V170.861h268.182V427.312z M410.135,115.744c0,15.978-13,28.979-28.973,28.979H101.266 c-15.973,0-28.973-13.001-28.973-28.979v-2.828c0-15.978,13-28.979,28.973-28.979h279.897c15.973,0,28.973,13.001,28.973,28.979 V115.744z">
                                        </path>
                                        <path
                                            d="M171.144,422.863c7.218,0,13.069-5.853,13.069-13.068V262.641c0-7.216-5.852-13.07-13.069-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C158.074,417.012,163.926,422.863,171.144,422.863z">
                                        </path>
                                        <path
                                            d="M241.214,422.863c7.218,0,13.07-5.853,13.07-13.068V262.641c0-7.216-5.854-13.07-13.07-13.07 c-7.217,0-13.069,5.854-13.069,13.07v147.154C228.145,417.012,233.996,422.863,241.214,422.863z">
                                        </path>
                                        <path
                                            d="M311.284,422.863c7.217,0,13.068-5.853,13.068-13.068V262.641c0-7.216-5.852-13.07-13.068-13.07 c-7.219,0-13.07,5.854-13.07,13.07v147.154C298.213,417.012,304.067,422.863,311.284,422.863z">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div>
                        <p class="text-black text-xl">Корзина пуста</p>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex items-center pt-6">
        <span class="text-sm font-medium text-gray-400 mr-1">Общая сумма:</span>
        <span id="totalCost" class="text-lg font-bold text-gray-800 "><x-price :price="auth()->user()->basketCost" /></span>
    </div>
    <form method="post" action="{{ route('order.store') }}" class="pt-3 flex items-center justify-between">
        @csrf
        <button type="submit"
            class="bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">Оформить
            заказ</button>
    </form>
    <!--            <span class="text-black text-xl text-center mb-4">В Вашей корзине нет товаров</span>-->
    <!--            <div class="mt-4">-->
    <!--                <a class="inline-flex items-center text-orange hover:opacity-75" href="catalog.html">-->
    <!--                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />-->
    <!--                    </svg>-->
    <!--                    К каталогу-->
    <!--                </a>-->
    <!--            </div>-->

</x-layouts.inner2>
<script>
    $('[data-basket]').each(function() {
        let $basket = $(this);
        let carId = $basket.data('id');

        let $incrementButton = $basket.find('[data-basket-increment]');
        let $decrementButton = $basket.find('[data-basket-decrement]');
        let $inputField = $basket.find('input[name="product_count"]');

        $basket.on('submit', function(event) {
            event.preventDefault();
        })

        $incrementButton.on('click', function() {
            let currentValue = parseInt($inputField.val());
            $inputField.val(currentValue + 1);
            $inputField.change();
        })

        $decrementButton.on('click', function() {
            let currentValue = parseInt($inputField.val());
            $inputField.val(Math.max(1, currentValue - 1));
            $inputField.change();
        })

        $inputField.on('change', function() {
            let value = Math.max(1, parseInt($inputField.val()));
            $inputField.val(value);
            $.ajax({
                url: "/basket/update",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    car_id: carId,
                    count: value,
                },
                success: function() {
                    $.ajax({
                        url: '/basket/cost',
                        type: 'GET',
                        success: function(data) {
                            $('#totalCost').html(data);
                        }
                    });
                }
            });
        })
    })
</script>
