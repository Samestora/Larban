<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-mary-input label="Email" id="email" class="mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-mary-password right label="Password" id="password" class="mt-1 w-full" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <x-mary-checkbox label="Remember Me" id="remember_me" name="remember" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-mary-button class="ms-4" type="submit">
                    {{ __('Log in') }}
                </x-mary-button>
            </div>
        </form>

        {{-- Not registered link --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Not registered?') }}
                <a href="{{ route('register') }}"
                    class="text-gray-600 underline dark:text-gray-400 dark:hover:text-gray-100">
                    {{ __('Create an account') }}
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
