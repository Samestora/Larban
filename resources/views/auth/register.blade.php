<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class= "mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-mary-input label="Username" id="name" class="mt-1 w-full" type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-mary-input label="Email" id="email" class="mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-mary-password label="Password" right id="password" class="mt-1 w-full" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-mary-password label="Confirm Password" right id="password_confirmation" class="mt-1 w-full"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <div class="flex items-center">
                        <x-mary-checkbox id="terms" name="terms" required />
                        <div class="ms-2 text-sm  dark:">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline hover: dark:hover:">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline hover: dark:hover:">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>

                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-primary-600 dark:text-primary-400 hover:text-primary-900 dark:hover:text-primary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-base-500 dark:focus:ring-offset-primary-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-mary-button class="ms-4" type="submit">
                    {{ __('Register') }}
                </x-mary-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
