@csrf
<div class="block">
    <label for="fieldTitile" class="text-gray-700 font-bold">Название новости</label>
    <input
        id="fieldTitile"
        type="text"
        class="mt-1 block w-full rounded-md @error('title') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        placeholder=""
        value="{{ old('title', $article->title) }}"
        name="title"
        >
    @error('title')
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <label for="fieldDescription" class="text-gray-700 font-bold">Краткое описание новости</label>
    <input
        id="fieldDescription"
        type="text"
        class="mt-1 block w-full rounded-md @error('description') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        placeholder=""
        value="{{ old('description', $article->description) }}"
        name="description"
        >
    @error('description')
        <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <label for="fieldBody" class="text-gray-700">Детальное описание</label>
    <textarea id="fieldBody" name="body" class="mt-1 block w-full rounded-md @error('body') border-red-600 @else border-gray-300 @enderror shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="10">
        {{ old('body', $article->body) }}
    </textarea>
    @error('body')
    <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>
<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                <input
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                    @if (old('published', ! is_null($article->published_at))) checked @endif
                    name="published"
                >
                <span class="ml-2">Опубликован</span>
            </label>
        </div>
    </div>
</div>