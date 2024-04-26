<x-layouts.admin page-title="Форма создания модели" title="Форма создания модели">
    <x-forms.form action="{{ route('admin.cars.store') }}" method="post" enctype="multipart/form-data">
        <x-forms.forms-fields.admin-car :car="new App\Models\Car()" />
        <x-forms.row>
            <x-forms.submit-button>Сохранить</x-forms.submit-button>
            <x-forms.cancel-button :href="route('admin.cars.index')">Отменить</x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>