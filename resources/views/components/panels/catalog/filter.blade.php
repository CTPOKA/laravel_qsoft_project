<form {{ $attributes->merge(['class' => 'border rounded p-4 space-y-4']) }}>
    <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
        <x-forms.groups.filter for="fieldFilterName">
            <x-slot:label>Модель:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterName"
                name="model"
                :value="request()->get('model', '')"
            />
        </x-forms.groups.filter>
        <x-forms.groups.filter for="fieldFilterPriceFrom">
            <x-slot:label>Цена от:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceFrom"
                name="min_price"
                :value="request()->get('min_price', '')"
            />
        </x-forms.groups.filter>
        <x-forms.groups.filter for="fieldFilterPriceTo">
            <x-slot:label>Цена до:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceTo"
                name="max_price"
                :value="request()->get('max_price', '')"
            />
        </x-forms.groups.filter>
        <div class="flex space-x-2 items-center">
            <x-forms.submit-button>
                <x-icons.search class="h-4 w-4" />
            </x-forms.submit-button>
            <x-forms.cancel-button :href="route('catalog')">
                <x-icons.x class="h-4 w-4" />
            </x-forms.cancel-button>
        </div>
    </div>
    <hr>
    <div class="flex space-x-2 items-center">
        <div class="font-bold">Сортировать по:</div>
        <x-catalog.sort-botton name="order_price" currentValue="{{ request()->get('order_price') }}">Цена</x-catalog.sort-botton>
        <x-catalog.sort-botton name="order_model" currentValue="{{ request()->get('order_model') }}">Модели</x-catalog.sort-botton>
    </div>
</form>