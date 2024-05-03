@props(['article'])
@csrf
<x-forms.groups.group for="fieldTitile" :error="$errors->first('title')">
    <x-slot:label>Название новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldTitile"
        name="title"
        placeholder="Парадигма просветляет архетип"
        :value="old('title', $article->title)"
        :error="$errors->first('title')"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox :error="$errors->first('published')">
    <x-slot:label>Опубликовано</x-slot:label>
    <x-forms.inputs.checkbox
    name="published"
    :checked="old('published', ! is_null($article->published_at))"
    :error="$errors->first('published')"
    />
</x-forms.groups.checkbox>

<x-forms.groups.group for="fieldArticleImage" :error="$errors->first('image')">
    <x-slot:label>Изображение новости</x-slot:label>
    <x-forms.inputs.one-file
        id="fieldArticleImage"
        name="image"
        :error="$errors->first('image')"
        :value="$article->imageUrl"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldDescription" :error="$errors->first('description')">
    <x-slot:label>Краткое описание</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldDescription"
        name="description"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        :value="old('description', $article->description)"
        :error="$errors->first('description')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldBody" :error="$errors->first('body')">
    <x-slot:label>Текст новости</x-slot:label>
    <x-forms.inputs.textarea 
        id="fieldBody"
        name="body"
        rows="16"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        :value="old('body', $article->body)"
        :error="$errors->first('body')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleTags" :error="$errors->first('tags')">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleTags"
        name="tags"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        :value="old('tags', $article->tags->pluck('name')->implode(', '))"
        :error="$errors->first('tags')"
    />
</x-forms.groups.group>