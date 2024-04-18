@extends('layouts.admin')

@section('page-title', 'Форма редактирования новости')
@section('title', 'Форма редактирования новости')

@section('inner_content')

@include('panels.messages.flashes')
@include('panels.messages.form_validation_errors')

<form action="{{ route('admin.articles.update', $article) }}" method="post">
    @method('PATCH')
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">

            @include('pages.admin.articles.form', ['article' => $article])

            <div class="block">
                <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Сохранить
                </button>
                <a href="{{ route('admin.articles.edit', ['article' => $article]) }}" class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Отменить
                </a>
            </div>
        </div>
    </div>
</form>
@endsection