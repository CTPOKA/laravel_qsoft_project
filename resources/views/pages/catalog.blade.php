<x-layouts.inner2 page-title="Каталог" title="Каталог">
    <x-slot:navigation>
        {{ Breadcrumbs::render('catalog', $catalogData->category) }}
    </x-slot:navigation>
    <x-panels.catalog.filter 
        class="my-4"
        method="get"
        :filter="$catalogData->filterDTO"
        :currentCategory="$catalogData->category"
    />  
    <x-panels.catalog.catalog :cars="$catalogData->cars" /> 
    <x-panels.pagination :paginator="$catalogData->cars" />
</x-layouts.inner2>