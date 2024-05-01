<x-mail::message>
# Новость была изменена
{{ $article->title }}
<br>
{{ $article->body }}

<x-mail::button :url="route('article', ['article' => $article], true)">
Перейти
</x-mail::button>

{{ config('app.name') }}
</x-mail::message>