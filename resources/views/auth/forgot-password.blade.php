<x-layouts.inner2 page-title="Восстановление пароля" title="Восстановление пароля">

    @if (session('status'))
        <x-panels.messages.success class="mb-4" :messages="(array) session('status')" />
    @endif

    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('password.email') }}" method="post">
        @csrf

        <x-forms.forms-fields.auth.email />

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Отправить ссылку на сброс пароля</x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>