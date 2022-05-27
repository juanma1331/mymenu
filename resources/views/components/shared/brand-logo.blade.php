@props([ 'size' => 'xs'])
<a href="#"
    {{ $attributes->class([
    'font-logo text-center text-primary font-semibold tracking-wider focus:outline-none  focus:ring-1 focus:ring-primary focus:ring-offset-1 focus:ring-offset-medium-gray',
    'text-xs' => $size === 'xs',
    'text-sm' => $size === 'sm',
    'text-lg' => $size === 'lg',
    'text-xl' => $size === 'xl',
    'text-2xl' => $size === '2xl',
    'text-3xl' => $size === '3xl',
    'text-4xl' => $size === '4xl',
    'text-5xl' => $size === '5xl',
    ]) }}
>
    MyMenu
</a>
