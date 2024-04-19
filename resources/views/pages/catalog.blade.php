@extends('layouts.app')

@section('page-title', 'Каталог')
@section('title', 'Каталог')

@section('content')

@include('panels.header_navigation', ['menu' => []])
<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
        
        <form class="my-4 border rounded p-4 space-y-4" method="get">
            <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
                <div class="flex space-x-2 items-center">
                    <label for="fieldFilterName" class="text-gray-700 font-bold">Модель:</label>
                    <input 
                        id="fieldFilterName"
                        type="text"
                        name="model"
                        value="{{ request()->get('model', '') }}"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder=""
                    >
                </div>
                <div class="flex space-x-2 items-center">
                    <label for="fieldFilterPriceFrom" class="text-gray-700 font-bold whitespace-nowrap">Цена от:</label>
                    <input 
                        id="fieldFilterPriceFrom"
                        type="text"
                        name="min_price"
                        value="{{ request()->get('min_price', '') }}"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder=""
                    >
                </div>
                <div class="flex space-x-2 items-center">
                    <label for="fieldFilterPriceTo" class="text-gray-700 font-bold whitespace-nowrap">Цена до:</label>
                    <input 
                        id="fieldFilterPriceTo"
                        type="text"
                        name="max_price"
                        value="{{ request()->get('max_price', '') }}"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder=""
                    >
                </div>
                <div class="flex space-x-2 items-center">
                    <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <a href="{{ route('catalog') }}" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            </div>
            <hr>
            <div class="flex space-x-2 items-center">
                <div class="font-bold">Сортировать по:</div>
                @include('panels.catalog.catalog_sort', ['name' => 'order_price', 'label' => 'Цена'])
                @include('panels.catalog.catalog_sort', ['name' => 'order_model', 'label' => 'Модели'])
            </div>
        </form>

        @include('panels.catalog.catalog', ['cars' => $cars])
        
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
    </div>
    
</main>
@endsection