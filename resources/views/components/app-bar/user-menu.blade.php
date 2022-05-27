<div x-data="{open: false}" class="relative">
    {{-- TOGGLER --}}
    <button
        @click="open = ! open"
        :aria-expanded="open"
        class="
         p-1
         flex items-center justify-center
         rounded-full
         text-primary
         hover:ring hover:ring-1 hover:ring-dark-gray
         "
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
        </svg>

    </button>
    {{-- END TOGGLER --}}
    <div x-show="open"
         @click.away = "open = false"
         x-transition
         class="
         bg-white
         absolute
         w-[200px]
         z-10
         top-10
         right-0
         shadow-lg
         rounded-sm
         "
    >
        {{-- MENU --}}
        <ul class="text-sm" aria-labelledby="user menu" :aria-expanded="open">
            <li class="rounded-sm text-primary hover:bg-primary hover:text-medium-gray">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                    <button type="submit" class="w-full flex cursor-pointer py-2 px-3">
                        Logout
                    </button>
                </form>

            </li>

            <li class="rounded-sm text-primary hover:bg-primary hover:text-medium-gray">

                <a href="#" class="w-full flex cursor-pointer py-2 px-3">
                    Settings
                </a>

            </li>
        </ul>
        {{-- END MENU --}}

    </div>
</div>
