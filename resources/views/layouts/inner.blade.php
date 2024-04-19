@extends('layouts.app')

@section('content')
@section('header_navigation')
    @include('panels.header_navigation', ['menu' => []])
@show
<main class="flex-1 container mx-auto bg-white flex">
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <aside class="hidden sm:block col-span-1 border-r p-4">
            @include('panels.left_information_menu')
        </aside>
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
            
            @yield('inner_content')
            
        </div>
    </div>
</main>
@endsection