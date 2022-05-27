@props(['product' => null])
<div class="
                 h-[86px]
                 flex
                 bg-white
                 rounded-sm
                 shadow-lg
                 overflow-hidden
                 relative
                 text-sm
                 {{ $product->is_active ? '' : 'outline outline-1 outline-red-300' }}
                "
>
    @if(is_null($product->image))
        <img class="w-full h-full object-center" src="https://via.placeholder.com/120" alt="">
    @else
        <img class="h-full flex-none aspect-video object-cover" src="{{ asset($product->image) }}" alt="">
    @endif

    <div class="p-2">
        <p class="capitalize font-semibold text-primary">{{ $product->name }}</p>
        <p class="text-slate-500 leading-4 line-clamp-2">{{ $product->description }}</p>
        <p class="text-primary font-bold">{{ $product->formatted_price }}</p>
    </div>
</div>
