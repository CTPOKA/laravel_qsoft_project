<x-layouts.admin page-title="Форма редактирования новости" title="Форма редактирования новости">
    <x-forms.form action="{{ route('admin.cars.update', $car) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        <x-forms.forms-fields.admin-car :car="$car" />
        <x-forms.row>
            <x-forms.submit-button>Сохранить</x-forms.submit-button>
            <x-forms.cancel-button :href="route('admin.cars.edit', $car)">Отменить</x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>