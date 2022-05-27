<x-layouts.app-layout-base>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

<form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <x-shared.form.input type="password" id="password" name="password" :label="__('Password')"
                                 required autocomplete="current-password"/>

            <div class="flex justify-end mt-4">
                <x-shared.button buttonType="submit">
                    {{ __('Confirm') }}
                </x-shared.button>
            </div>
        </form>
</x-layouts.app-layout-base>
