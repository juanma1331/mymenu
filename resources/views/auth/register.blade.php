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
            <form method="POST" action="{{ route('register') }}" class="flex flex-col space-y-3">
                @csrf

                <x-shared.form.input id="name" name="name" :label="__('Name')" required autofocus/>
                <x-shared.form.input type="email" id="email" name="email" :label="__('Email')" :value="old('name')"/>
                <x-shared.form.input type="password" id="password" name="password" :label="__('Password')"
                                     autocomplete="new-password"/>
                <x-shared.form.input type="password" id="password_confirmation" name="password_confirmation"
                                     :label="__('Confirm Password')"/>

                <div class="flex items-center gap-4 justify-end mt-4">
                    <x-shared.form.link href="{{ route('login') }}">
                        {{ __('Already registered?') }}

                    </x-shared.form.link>
                    <x-shared.button buttonType="submit" type="primary"
                                     class="ml-3">{{ __('Register') }}</x-shared.button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app-layout-base>
