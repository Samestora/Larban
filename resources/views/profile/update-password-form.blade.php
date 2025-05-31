<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    @if (auth()->user()->hasVerifiedEmail())
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-mary-input label="Current Password" id="current_password" type="password" class="mt-1  w-full"
                    wire:model="state.current_password" required autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-mary-input label="New Password" id="password" type="password" class="mt-1  w-full"
                    wire:model="state.password" required autocomplete="new-password" />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-mary-input label="Confirm Password" id="password_confirmation" type="password" class="mt-1  w-full"
                    wire:model="state.password_confirmation" required autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-input-error for="unverified" class="mt-2"></x-input-error>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-mary-button icon="o-check">
                {{ __('Save') }}
            </x-mary-button>
        </x-slot>
    @else
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-mary-input label="Current Password" id="current_password" type="password" class="mt-1  w-full"
                    readonly disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <x-mary-input label="Password" id="password" type="password" class="mt-1  w-full" readonly disabled />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-mary-input label="Password Confirmation" id="password_confirmation" type="password" class="mt-1"
                    readonly disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-mary-button disabled>
                {{ __('Verify your email first') }}
            </x-mary-button>
        </x-slot>
    @endif
</x-form-section>
