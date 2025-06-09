<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm font-bold">Profile</h2>
    </x-slot>

    {{-- Content --}}
    <div class="space-y-4">
        {{-- Header Section --}}
        <div class="p-6 lg:p-8 bg-base-200 border-b border-base-200 dark:border-base-300 rounded-xl shadow-lg">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex items-center justify-center w-16 h-16 bg-primary/10 rounded-full mb-4">
                    <i class="fas fa-user-circle text-primary text-2xl"></i>
                </div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-primary leading-tight">
                    Profile Settings
                </h1>
                <h2 class="mt-2 text-lg md:text-xl font-medium text-base-content dark:text-base-content">
                    Manage your account preferences and security
                </h2>
            </div>

        {{-- Profile Sections Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10 p-8 lg:p-12">
            
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                {{-- Profile Information Card --}}
                <div class="lg:col-span-3">
                    <div class="bg-base-100 p-8 rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                        <div class="flex items-center mb-6">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl mr-4">
                                <i class="fas fa-user-edit text-primary text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-base-content">Profile Information</h3>
                        </div>
                        
                        <div class="mt-6">
                            @livewire('profile.update-profile-information-form')
                        </div>
                    </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                {{-- Password Update Card --}}
                <div class="lg:col-span-3">
                <div class="flex flex-col justify-between bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 bg-warning/10 rounded-xl mr-3">
                                <i class="fas fa-key text-warning text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Update Password</h3>
                        </div>

                        <p class="text-base-content dark:text-base-content leading-relaxed mb-4">
                            Ensure your account is using a long, random password to stay secure.
                        </p>

                        <div class="mt-6">
                            @livewire('profile.update-password-form')
                        </div>
                    </div>
                </div>
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                {{-- Two Factor Authentication Card --}}
                <div class="lg:col-span-3">
                <div class="flex flex-col justify-between bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 bg-success/10 rounded-xl mr-3">
                                <i class="fas fa-shield-alt text-success text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold">Two Factor Authentication</h3>
                        </div>

                        <p class="text-base-content dark:text-base-content leading-relaxed mb-4">
                            Add additional security to your account using two factor authentication.
                        </p>
                    </div>

                    <div class="mt-6">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                </div>
                </div>
            @endif

            {{-- Browser Sessions Card --}}
            <div class="lg:col-span-3">
            <div class="flex flex-col justify-between bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 bg-info/10 rounded-xl mr-3">
                            <i class="fas fa-desktop text-info text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold">Browser Sessions</h3>
                    </div>

                    <p class="text-base-content dark:text-base-content leading-relaxed mb-4">
                        Manage and log out your active sessions on other browsers and devices.
                    </p>
                </div>

                <div class="mt-6">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                {{-- Delete Account Card --}}
                <div class="lg:col-span-3">
                <div class="flex flex-col justify-between bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-error/20 dark:border-error/30">
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 bg-error/10 rounded-xl mr-3">
                                <i class="fas fa-exclamation-triangle text-error text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-error">Delete Account</h3>
                        </div>

                        <p class="text-base-content dark:text-base-content leading-relaxed mb-4">
                            Permanently delete your account and all associated data.
                        </p>
                    </div>

                    <div class="mt-6">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>