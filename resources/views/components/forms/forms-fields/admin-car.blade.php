@props(['car'])
@csrf

<x-forms.groups.group for="fieldCarName" :error="$errors->first('name')">
    <x-slot:label>Название модели</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarName"
        name="name"
        placeholder="Stinger"
        :value="old('name', $car->name)"
        :error="$errors->first('name')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarMainImage" :error="$errors->first('image')">
    <x-slot:label>Основное изображение модели</x-slot:label>
    <x-forms.inputs.one-file
        id="fieldCarMainImage"
        name="image"
        :error="$errors->first('image')"
        :value="$car->image"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarPrice" :error="$errors->first('price')">
    <x-slot:label>Цена с учетом скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarPrice"
        name="price"
        placeholder="1000000"
        :value="old('price', $car->price)"
        :error="$errors->first('price')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarOldPrice" :error="$errors->first('old_price')">
    <x-slot:label>Цена без скидки</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarOldPrice"
        name="old_price"
        placeholder="1000001"
        :value="old('old_price', $car->old_price)"
        :error="$errors->first('old_price')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarCategories" :error="$errors->first('categories')">
    <x-slot:label>Категории</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarCategories"
        name="categories[]"
        :error="$errors->first('categories')"
        multiple
    >
    @foreach ($categories as $category)
        <option @selected(in_array($category->id, old('categories', $car->categories->pluck('id')->all()))) value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarDescription" :error="$errors->first('body')">
    <x-slot:label>Описание модели</x-slot:label>
    <x-forms.inputs.textarea 
        id="fieldCarDescription"
        name="body"
        :value="old('body', $car->body)"
        :error="$errors->first('body')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarSalon" :error="$errors->first('salon')">
    <x-slot:label>Салон</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarSalon"
        name="salon"
        placeholder="Черный, Натуральная кожа (WK)"
        :value="old('salon', $car->salon)"
        :error="$errors->first('salon')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarKPP" :error="$errors->first('kpp')">
    <x-slot:label>КПП</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarKPP"
        name="kpp"
        placeholder="Автомат, 6 AT"
        :value="old('kpp', $car->kpp)"
        :error="$errors->first('kpp')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarYear" :error="$errors->first('year')">
    <x-slot:label>Год выпуска</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarYear"
        name="year"
        placeholder="2022"
        :value="old('year', $car->year)"
        :error="$errors->first('year')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarColor" :error="$errors->first('color')">
    <x-slot:label>Цвет</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarColor"
        name="color"
        placeholder="Yacht Blue (DU3)"
        :value="old('color', $car->color)"
        :error="$errors->first('color')"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarClass" :error="$errors->first('car_class_id')">
    <x-slot:label>Класс</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarClass"
        name="car_class_id"
        :error="$errors->first('car_class_id')"
    >
    @foreach ($carClasses as $class)
        <option @selected($car->car_class_id == old('car_class_id', $class->id)) value="{{ $class->id }}">
            {{ $class->name }}
        </option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarBody" :error="$errors->first('car_body_id')">
    <x-slot:label>Кузов</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarBody"
        name="car_body_id"
        :error="$errors->first('car_body_id')"
    >
    @foreach ($carBodies as $body)
        <option @selected($car->car_body_id == old('car_body_id', $body->id)) value="{{ $body->id }}">
            {{ $body->name }}
        </option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarEngine" :error="$errors->first('car_engine_id')">
    <x-slot:label>Двигатель</x-slot:label>
    <x-forms.inputs.select
        id="fieldCarEngine"
        name="car_engine_id"
        :error="$errors->first('car_engine_id')"
    >
    @foreach ($carEngines as $engine)
        <option @selected($car->car_engine_id == old('car_engine_id', $engine->id)) value="{{ $engine->id }}">
            {{ $engine->name }}
        </option>
    @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="fieldCarAdditionalImages" :error="$errors->first('images')">
    <x-slot:label>Основное изображение модели</x-slot:label>
    <x-forms.inputs.multiple-file
        id="fieldCarAdditionalImages"
        name="images"
        :error="$errors->first('images')"
        :values="['/assets/images/no_image.png', '/assets/images/no_image.png', '/assets/images/no_image.png']"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox :error="$errors->first('is_new')">
    <x-slot:label>Новинка</x-slot:label>
    <x-forms.inputs.checkbox
    name="is_new"
    :checked="old('is_new', $car->is_new)"
    :error="$errors->first('is_new')"
    />
</x-forms.groups.checkbox>

<x-forms.groups.group for="fieldCarTags" :error="$errors->first('tags')">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldCarTags"
        name="tags"
        placeholder="Парадигма, Архетип, Киа Seed"
        :value="old('tags', $car->tags->pluck('name')->implode(', '))"
        :error="$errors->first('tags')"
    />
</x-forms.groups.group>