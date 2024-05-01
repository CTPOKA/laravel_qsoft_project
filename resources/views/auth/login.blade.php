<x-layouts.inner2 page-title="Авторизация" title="Авторизация">

    @if (session('status'))
        <x-panels.messages.success class="mb-4" :messages="(array) session('status')" />
    @endif

    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('login') }}" method="post">
        @csrf

        <x-forms.forms-fields.auth.email />

        <x-forms.forms-fields.auth.password />

        <x-forms.groups.checkbox :error="$errors->first('remember_me')">
            <x-slot:label>Запомнить меня</x-slot:label>
            <x-forms.inputs.checkbox
            name="remember_me"
            :checked="old('remember_me')"
            :error="$errors->first('remember_me')"
            />
        </x-forms.groups.checkbox>

        <x-forms.row class="space-x-4">            
            <x-forms.submit-button>Войти</x-forms.submit-button>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>
