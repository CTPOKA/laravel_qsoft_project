<x-layouts.inner2 page-title="Сброс пароля" title="Сброс пароля">

    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('password.store') }}" method="post">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-forms.forms-fields.auth.email />

        <x-forms.forms-fields.auth.password :withConfirmation="true" />

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Сбросить пароль</x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>