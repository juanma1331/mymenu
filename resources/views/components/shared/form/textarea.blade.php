@props(['name', 'id', 'label', 'value'])
<div>
    @isset($label)
        <x-shared.form.label for={{ $id }}>
            {{ $label }}
        </x-shared.form.label>
    @endisset

    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes->merge([]) }}
        {{ $attributes->class([
    'form-input',
    'block',
    'w-full',
    'px-3 py-1.5 m-0',
    'rounded-sm',
    'text-base',
    'font-normal text-primary',
    'bg-white bg-clip-padding',
    'border border-solid border-gray-300',
    'transition ease-in-out',
    'focus:text-gray-700 focus:bg-white focus:border-1 focus:border-primary focus:ring-0 focus:outline-0',
    'ring ring-1 ring-danger' => $errors->has($name)
    ]) }} >{{ $value }}</textarea>

    @error($name)
    <p class="text-xs mt-1.5 text-danger">{{ $message }}</p>
    @enderror

</div>
