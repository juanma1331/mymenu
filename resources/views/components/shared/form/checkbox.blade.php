@props(['id', 'name'])
<div>
    <input type="checkbox"
           id="{{ $id }}"
           name="{{ $name }}"
        {{ $attributes->class([
        'form-checkbox',
        'text-primary',
        'h-4 w-4',
        'mt-1 mr-2',
        'appearance-none',
        'border border-gray-300',
        'bg-white',
        'align-top',
        'bg-no-repeat bg-center bg-contain',
        'float-left',
        'cursor-pointer',
        'transition duration-200',
        'checked:bg-primary',
        'focus:outline-primary'
 ]) }} />

    <x-shared.form.label for="$id">
        {{ $slot  }}
    </x-shared.form.label>
</div>
