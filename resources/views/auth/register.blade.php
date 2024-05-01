<x-layouts.inner2 page-title="Регистрация" title="Регистрация">
    <x-panels.messages.form_validation_errors />

    <x-forms.form action="{{ route('register') }}" method="post">
        @csrf

        <x-forms.groups.group for="name" :error="$errors->first('name')">
            <x-slot:label>Ваше имя</x-slot:label>
            <x-forms.inputs.text
                id="name"
                name="name"
                placeholder="Вася Пупкин"
                required
                autofocus
                autocomplete="name"
                :value="old('name')"
                :error="$errors->first('name')"
            />
        </x-forms.groups.group>

        <x-forms.forms-fields.auth.email />

        <x-forms.forms-fields.auth.password :withConfirmation="true" />

        <x-forms.row class="space-x-4">
            <x-forms.submit-button>Регистрация</x-forms.submit-button>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Уже зарегистрированы?
            </a>
        </x-forms.row>
    </x-forms.form>

</x-layouts.inner2>