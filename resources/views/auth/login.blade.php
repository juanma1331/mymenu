<x-layouts.app-layout-base>

    <div class="
         h-full w-full
         p-4
         flex flex-col justify-center items-center space-y-[100px]
        "
    >
        <x-shared.brand-logo size="4xl"/>

        <div class="
            w-full
            p-4
            md:max-w-2xl
            ">
            <form method="POST" action="{{ route('login') }}" class="flex flex-col space-y-3">
                @csrf

                <x-shared.form.input type="email" name="email" id="email" label="Email"/>
                <x-shared.form.input type="password" name="password" id="password" label="Password"/>
                <x-shared.form.checkbox name="remember_me" id="remember_me">Remember me</x-shared.form.checkbox>

                <div class="flex items-center gap-4 justify-end mt-4">
                    @if (Route::has('password.request'))
                        <x-shared.form.link href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </x-shared.form.link>
                    @endif
                    <x-shared.button buttonType="submit" type="primary" class="ml-3">Login</x-shared.button>
                </div>
            </form>

        </div>

    </div>
</x-layouts.app-layout-base>
