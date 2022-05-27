@props(['type' => 'text', 'value' => '', 'name', 'id', 'label'])

@php
    $inputDefaultClass = "
    block
    w-full
    px-3 m-0
    rounded-sm
    text-base
    font-normal text-primary
    bg-transparent bg-clip-padding
    border border-slate-300
    focus:border-primary focus:outline-0 focus:ring-0
    transition ease-in-out
    file:mr-2 file:bg-transparent file:text-sm file:border-0 file:px-0 file:py-2 file:text-primary file:cursor-pointer";

    if ($errors->has($name)) {
        $inputDefaultClass = $inputDefaultClass . ' ' . 'ring ring-1 ring-danger';
    }

    if ($type !== 'file') {
        $inputDefaultClass = $inputDefaultClass . ' ' . 'py-1.5 form-input';
    }
@endphp

<div>
    @isset($label)
        <x-shared.form.label for="{{ $id }}">
            {{ $label }}
        </x-shared.form.label>
    @endisset

    <input {{ $attributes->merge([
    'id' => $id,
    'type' => $type,
    'name' => $name,
    'value' => $value,
    'class' => $inputDefaultClass]) }} />

    @error($name)
    <p class="text-xs mt-1.5 text-danger">{{ $message }}</p>
    @enderror
</div>
