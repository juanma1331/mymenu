@props(['type' => 'error', 'message'])

<div x-data="{open: true}" aria-labelledby="{{ 'alert '.$type }}" :aria-expanded="open">
    <div
        x-show="open"
        {{ $attributes->class([
        'w-full',
        'py-5 px-6',
        'text-sm text-gray-100',
        'flex justify-between items-center',
        'rounded',
        'bg-red-400' => $type === 'error'
        ]) }}>

        <p>{{ $message }}</p>

        <button
            x-on:click="open = false"
            class="
            p-[1px]
            rounded-full
            hover:bg-primary hover:text-slate-50
            ">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </button>
    </div>

</div>
