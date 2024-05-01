<x-forms.groups.group for="email" :error="$errors->first('email')">
    <x-slot:label>Email</x-slot:label>
    <x-forms.inputs.text
        id="email"
        type="email"
        name="email"
        placeholder="example@example.com"
        required
        autofocus
        :value="old('email')"
        :error="$errors->first('email')"
    />
</x-forms.groups.group>