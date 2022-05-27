@props(['href', 'active'])
<a href="{{ $href }}"
   {{ $attributes->class([
    'text-primary',
    'p-2',
    'hover:border-b hover:border-1 hover:border-primary',
    'border-b border-1 border-primary' => request()->routeIs($active . '.' . '*')

]) }}
   class="
       p-2
       hover:bg-medium-gray
       ">
    {{ $slot }}
</a>
