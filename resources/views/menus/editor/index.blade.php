<x-app-layout>
        <h1 class="text-2xl uppercase font-semibold tracking-wider text-center font-bold tracking-wider text-gray-700">{{ $menu->name }}</h1>
        <ul class="flex flex-col space-y-1 mt-4">
            @forelse($menu->sections as $section)
                <li>
                        <h2 class="text-lg font-semibold tracking-wider text-gray-600 uppercase border-b border-gray-700">{{ $section->title }}</h2>

                        @if ($section->products()->count())
                            <ul class="flex flex-col space-y-3 mt-4">
                                @foreach($section->products as $product)
                                    <li>
                                        {{-- PRODUCT --}}
                                      <x-menus.product :product="$product" />
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                </li>
            @empty
                <p>No Sections</p>
            @endforelse
        </ul>

    <x-menus.editor.section-form :menu="$menu" />
    <x-menus.editor.product-form :menu="$menu"/>


</x-app-layout>
