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

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <x-shared.form.input type="email" id="email" name="email" :label="__('Email')" :value="old('name')" autofocus/>

                <div class="flex items-center justify-end mt-4">
                    <x-shared.button type="primary">
                        {{ __('Email Password Reset Link') }}
                    </x-shared.button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app-layout-base>
