@props([])
<a {{$attributes->merge(['class' =>
'underline text-sm text-dark-gray hover:text-primary focus:outline-none focus:ring-1 focus:ring-primary focus:ring-offset-1 focus:ring-offset-medium-gray'
])}}>
    {{ $slot }}
</a>
