<x-layouts.inner2 page-title="{{$title = $product->name}}" title="{{ $title }}">
    <script>
        $(function () {
          $('[data-slick-carousel-detail]').each(function () {
            let $carousel = $(this);
    
            $carousel.find('[data-slick-carousel-detail-items]').slick({
              dots: true,
              arrows: false,
              appendDots: $carousel.find('[data-slick-carousel-detail-pager]'),
              rows: 0,
              customPaging: function (slick, index) {
                let imageSrc = slick.$slides[index].src;
    
                return `
    <div class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="active-arrow absolute -top-6 left-2/4 -ml-3 text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
    <span class="inline-block border rounded cursor-pointer"><img class="h-20 w-40 object-cover" src="${imageSrc}" alt="" title=""></span>
    </div>`;
              }
            })
          })
        })
    </script>
    <x-slot:navigation>
        {{ Breadcrumbs::render('product', $product) }}
    </x-slot:navigation>
    <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
        <div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
            <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                <img class="w-full" src="{{ $product->imageUrl }}" alt="{{ $product->name }}">
                @foreach ($product->images as $image)
                    <img class="w-full" src="{{ $image->url }}" alt="{{ $product->name }}">
                @endforeach
            </div>
            <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <div class="space-y-4 w-full">
                <div class="block px-4">
                    <p class="font-bold">Цена:</p>
                    @if ($product->old_price)
                        <p class="text-base line-through text-gray-400"><x-price :price="$product->old_price" /></p>
                    @endif
                    <p class="font-bold text-2xl text-orange"><x-price :price="$product->price" /></p>
                    <div class="mt-4 block">
                        <form method="post" action="{{ route('basket.store') }}">
                            @csrf
                            <button name="car_id" value="{{ $product->id }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                <x-icons.basket class="inline-block h-6 w-6 mr-2" />
                                Купить
                            </button>
                        </form>
                    </div>
                </div>
                <x-panels.accordion :active=true>
                    <x-slot:label>Параметры</x-slot:label>
                    <x-panels.catalog.detail-products-props>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Салон:</x-slot:label>
                            {{ $product->salon }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Класс:</x-slot:label>
                            {{ $product->carClass->name }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>КПП:</x-slot:label>
                            {{ $product->kpp }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Год выпуска:</x-slot:label>
                            {{ $product->year }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Цвет:</x-slot:label>
                            {{ $product->color }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Кузов:</x-slot:label>
                            {{ $product->carBody->name }}
                        </x-panels.catalog.detail-products-props-row>
                        <x-panels.catalog.detail-products-props-row>
                            <x-slot:label>Двигатель:</x-slot:label>
                            {{ $product->carEngine->name }}
                        </x-panels.catalog.detail-products-props-row>
                        @if ($product->tags->isNotEmpty())
                            <x-panels.catalog.detail-products-props-row>
                                <x-slot:label>Теги:</x-slot:label>
                                <x-panels.tags :tags="$product->tags" />
                            </x-panels.catalog.detail-products-props-row>
                        @endif
                    </x-panels.catalog.detail-products-props>
                </x-panels.accordion>
                <x-panels.accordion>
                    <x-slot:label>Описание</x-slot:label>
                    <div class="space-y-4">
                        <p>{{ $product->body }}</p>
                    </div>
                </x-panels.accordion>
            </div>
        </div>
    </div>
</x-layouts.inner2>