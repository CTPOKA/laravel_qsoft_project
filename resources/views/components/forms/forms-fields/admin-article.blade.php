@props(['article'])
@csrf
<x-forms.groups.group for="fieldTitile" :error="$errors->first('title')">
    <x-slot:label>Название новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldTitile"
        name="title"
        :value="old('title', $article->title)"
        :error="$errors->first('title')"
    />
</x-forms.groups.group>
<x-forms.groups.group for="fieldDescription" :error="$errors->first('description')">
    <x-slot:label>Краткое описание новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldDescription"
        name="description"
        :value="old('description', $article->title)"
        :error="$errors->first('description')"
    />
</x-forms.groups.group>
<x-forms.groups.group for="fieldBody" :error="$errors->first('body')">
    <x-slot:label>Детальное описание</x-slot:label>
    <x-forms.inputs.textarea 
        id="fieldBody"
        name="body"
        rows="10"
        :value="old('body', $article->body)"
        :error="$errors->first('body')"
    />
</x-forms.groups.group>
<x-forms.groups.checkbox :error="$errors->first('published')">
    <x-slot:label>Опубликован</x-slot:label>
    <x-forms.inputs.checkbox
    name="published"
    :checked="old('published', ! is_null($article->published_at))"
    :error="$errors->first('published')"
    />
</x-forms.groups.checkbox>

<x-forms.groups.group for="fieldArticleTags" :error="$errors->first('tags')">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleTags"
        name="tags"
        :value="old('tags', $article->tags->pluck('name')->implode(', '))"
        :error="$errors->first('tags')"
    />
</x-forms.groups.group>