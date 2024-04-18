@extends('layouts.app')

@section('menu')
    @include('panels.admin.navigation_menu')
@endsection

@section('footer_navigation', '')

@section('content')
<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

        @yield('inner_content')

    </div>
</main>
@endsection