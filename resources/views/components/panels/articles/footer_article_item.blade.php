@props(['article'])
<div class="w-full flex">
    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
        <a class="block w-full h-full hover:opacity-75" href="{{ $url = route('article', $article) }}"><img src="{{ $article->imageUrl }}" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
    </div>
    <div class="px-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-white font-bold text-xl mb-2">
                <a class="hover:text-orange" href="{{ $url }}">{{ $article->title }}</a>
            </div>
            <p class="text-gray-300 text-base">
                <a class="hover:text-orange" href="{{ $url }}">{{ $article->description }}</a>
            </p>
        </div>
        <x-panels.tags :tags="$article->tags" />
        <div class="flex items-center">
            <p class="text-sm text-gray-400 italic">{{ $article->published_at }}</p>
        </div>
    </div>
</div>