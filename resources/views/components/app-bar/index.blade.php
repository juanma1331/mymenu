<div class="px-2 sm:px-0 py-2.5">

    <div class="flex flex-wrap justify-between items-center">

        <x-shared.brand-logo size="lg"/>

        <div class="flex items-center gap-2">
            <div class="flex items-center gap-2">
                <x-shared.avatar>
                    <p>{{ Auth::user()->email_first_letter }}</p>
                </x-shared.avatar>

                <p class="text-sm">{{ Auth::user()->email }}</p>
            </div>

            <x-app-bar.user-menu />
        </div>

    </div>
</div>

<nav class="
     flex justify-center items-center  gap-7
     border-t border-1 border-medium-gray
     bg-light-gray
     shadow-md
    ">

    <x-app-bar.link href="{{ route('menus.index') }}" active="menus">
        Menus
    </x-app-bar.link>

    <x-app-bar.link href="{{ route('products.index') }}" active="products">
        Inventory
    </x-app-bar.link>
</nav>
