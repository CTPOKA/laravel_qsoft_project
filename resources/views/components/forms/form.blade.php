<form {{ $attributes }}>
    <div class="mt-8 max-w-md">
        <div class="grid grid-cols-1 gap-6">
            {{ $slot }}
        </div>
    </div>
</form>