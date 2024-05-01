<x-layouts.inner2 page-title="Подтверждение пароля" title="Подтверждение пароля">

    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('password.confirm') }}" method="post">
        @csrf

        <x-forms.forms-fields.auth.password />

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Подтвердить</x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>