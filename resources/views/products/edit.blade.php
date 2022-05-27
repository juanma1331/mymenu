<x-layouts.app-layout>
    <x-slot:assets>
        @livewireStyles
        @livewireScripts
    </x-slot:assets>

    <div class="py-2 flex justify-end">
        <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
            @csrf
            @method('DELETE')
            <x-shared.button buttonType="submit" type="danger">
                Eliminar
            </x-shared.button>
        </form>

    </div>

    <x-products.product-form :product="$product" />

</x-layouts.app-layout>


