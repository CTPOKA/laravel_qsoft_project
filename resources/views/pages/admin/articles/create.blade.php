<x-layouts.admin page-title="Форма создания новости" title="Форма создания новости">
    <x-forms.form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
        <x-forms.forms-fields.admin-article :article="new App\Models\Article()" />
        <x-forms.row>
            <x-forms.submit-button>Сохранить</x-forms.submit-button>
            <x-forms.cancel-button :href="route('admin.articles.index')">Отменить</x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>