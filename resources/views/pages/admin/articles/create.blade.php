@extends('layouts.admin')

@section('page-title', 'Форма создания новости')
@section('title', 'Форма создания новости')

@section('inner_content')

@include('panels.messages.flashes')
@include('panels.messages.form_validation_errors')

<form action="{{ route('admin.articles.store') }}" method="post">
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">

            @include('pages.admin.articles.form', ['article' => new App\Models\Article()])

            <div class="block">
                <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Сохранить
                </button>
                <a href="{{ route('admin.articles.index') }}" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Отменить
                </a>
            </div>
        </div>
    </div>
</form>
@endsection