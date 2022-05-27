@props([
    'type' => 'default',
    'buttonType' => 'button',
    'isLink' => false,
    'href' => '#'
])

@if($isLink)
    <a href="{{ $href }}"
        {{ $attributes->class([
        'inline-block',
        'text-center',
        'px-6',
        'py-2.5',
        'bg-primary',
        'shadow-md',
        'rounded-sm',
        'font-medium text-xs tracking-wider uppercase',
        'hover:shadow-lg',
        'focus:shadow-lg focus:outline-none focus:ring-0',
        'active:shadow-lg',
        'transition duration-150 ease-in-out',
        'bg-slate-50' => $type === 'default',
        'text-primary' => $type === 'default',
        'border border-1 border-primary' => $type === 'default',
        'hover:bg-slate-200' => $type === 'default',
        'focus:bg-slate-200' => $type === 'default',
        'active:bg-slate-200' => $type === 'default',
        'text-slate-50' => $type === 'primary',
        'hover:bg-slate-600' => $type === 'primary',
        'focus:bg-slate-600' => $type === 'primary',
        'active:bg-slate-600' => $type === 'primary',
        'bg-danger' => $type === 'danger',
        'text-white' => $type === 'danger',
        'hover:bg-red-300' => $type === 'danger',
    ])}}>
        {{ $slot }}
    </a>

@else
    <button type="{{ $buttonType }}"
        {{ $attributes->class([
        'inline-block',
        'px-6',
        'py-2.5',
        'bg-primary',
        'shadow-md',
        'rounded-sm',
        'font-medium text-xs tracking-wider  uppercase',
        'hover:shadow-lg',
        'focus:shadow-lg focus:outline-none focus:ring-0',
        'active:shadow-lg',
        'transition duration-150 ease-in-out',
        'bg-slate-50' => $type === 'default',
        'text-primary' => $type === 'default',
        'border border-1 border-primary' => $type === 'default',
        'hover:bg-slate-200' => $type === 'default',
        'focus:bg-slate-200' => $type === 'default',
        'active:bg-slate-200' => $type === 'default',
        'text-slate-50' => $type === 'primary',
        'hover:bg-slate-600' => $type === 'primary',
        'focus:bg-slate-600' => $type === 'primary',
        'active:bg-slate-600' => $type === 'primary',
        'bg-danger' => $type === 'danger',
        'text-white' => $type === 'danger',
        'hover:bg-red-300' => $type === 'danger',
    ])}}>
        {{ $slot }}
    </button>
@endif


