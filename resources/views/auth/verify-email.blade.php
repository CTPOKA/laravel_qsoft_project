<x-layouts.inner2 page-title="Подтверждение Email" title="Подтверждение Email">

    @if (session('status'))
        <x-panels.messages.success class="mb-4" :messages="['Ссылка на завершение регистрации была отправлена на ваш Email']" />
    @endif

    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('verification.send') }}" method="post">
        @csrf

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Отправить сообщение заново</x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

    <x-forms.form action="{{ route('logout') }}" method="post">
        @csrf

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Выйли</x-forms.submit-button>
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>