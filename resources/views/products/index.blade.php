<x-layouts.app-layout>

    <div class="flex justify-end">
        <x-shared.button type="primary" isLink href="{{ route('products.create') }}">
            New Product
        </x-shared.button>
    </div>

    <div class=" pb-4 mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
        @foreach($products as $product)
            <a class="rounded-sm hover:cursor-pointer hover:outline hover:outline-1 hover:outline-primary"
               href="{{ route('products.edit', ['product' => $product->id]) }}"
            >
                <x-products.product :product="$product" />
            </a>
        @endforeach
    </div>

</x-layouts.app-layout>

