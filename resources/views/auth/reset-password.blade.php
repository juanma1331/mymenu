<x-layouts.app-layout-base>


        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-shared.form.input type="email" id="email" name="email" :label="__('Email')" :value="old('email', $request->email)" autofocus />

            <x-shared.form.input type="password" id="password" name="password" :label="__('Password')" />

            <x-shared.form.input type="password" id="password_confirmation" name="password_confirmation"
                                 :label="__('Confirm Password')" required />

            <div class="flex items-center justify-end mt-4">
                <x-shared.button type="primary">
                    {{ __('Reset Password') }}
                </x-shared.button>
            </div>

        </form>
</x-layouts.app-layout-base>
