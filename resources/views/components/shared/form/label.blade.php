@props(['for'])
<label
    for="{{ $for }}"
    {{ $attributes->class(['form-label inline-block mb-2 text-primary']) }}
>
    {{$slot}}
</label>
