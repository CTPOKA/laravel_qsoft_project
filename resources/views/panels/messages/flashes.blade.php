@inject('flashMassege', App\Contracts\Services\FlashMessageContract::class)
@php
$errors = $flashMassege->errorMessages();
$success = $flashMassege->successMessages();
@endphp

@if ($errors->isNotEmpty())
    @include('panels.messages.error', ['messages' => $errors])
@endif
@if ($success->isNotEmpty())
    @include('panels.messages.success', ['messages' => $success])
@endif