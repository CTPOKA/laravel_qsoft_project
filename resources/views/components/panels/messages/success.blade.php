@props(['messages'])
<div class="my-4">
    <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
        @foreach ($messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
</div>