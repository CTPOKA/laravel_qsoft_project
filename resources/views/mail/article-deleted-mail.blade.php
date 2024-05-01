<x-mail::message>
# Новость была удалена
{{ $article->title }}
<br>
{{ $article->body }}

{{ config('app.name') }}
</x-mail::message>