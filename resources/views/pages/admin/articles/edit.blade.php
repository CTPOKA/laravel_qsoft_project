<x-layouts.admin page-title="Форма редактирования новости" title="Форма редактирования новости">
    <x-forms.form action="{{ route('admin.articles.update', $article) }}" method="post">
        @method('PATCH')
        <x-forms.forms-fields.admin-article :article="$article" />
        <x-forms.row>
            <x-forms.submit-button>Сохранить</x-forms.submit-button>
            <x-forms.cancel-button :href="route('admin.articles.edit', $article)">Отменить</x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>