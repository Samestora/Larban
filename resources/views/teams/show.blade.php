<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm font-bold">Team</h2>
    </x-slot>

{{-- Content --}}
    <div class="space-y-4">
        {{-- Header Section --}}
        <div class="p-6 lg:p-8 bg-base-200 border-b border-base-200 dark:border-base-300 rounded-xl shadow-lg">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex items-center justify-center w-16 h-16 bg-primary/10 rounded-full mb-4">
                    <i class="fas fa-users-cog text-primary text-2xl"></i>
                </div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-primary leading-tight">
                    Team Settings
                </h1>
                <h2 class="mt-2 text-lg md:text-xl font-medium text-base-content dark:text-base-content">
                    Manage your team and its members
                </h2>
            </div>
    <div>

    {{-- Team Sections Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10 p-8 lg:p-12">

        {{-- Team Name Information Card --}}
                <div class="lg:col-span-3">
                    <div class="bg-base-100 p-8 rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                        <div class="flex items-center mb-6">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl mr-4">
                                <i class="fas fa-user-edit text-primary text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-base-content">Team Name</h3>
                        </div>
                    <div class="mt-6">
                            @livewire('teams.update-team-name-form', ['team' => $team])
                        </div>
                    </div>
                </div>

        {{-- Add Team Information Card --}}
                <div class="lg:col-span-3">
                    <div class="bg-base-100 p-8 rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                        <div class="flex items-center mb-6">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary/10 rounded-xl mr-4">
                                <i class="fas fa-user-plus text-primary text-xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-base-content">Add Team Member</h3>
                        </div>
                    <div class="mt-2">
                            @livewire('teams.team-member-manager', ['team' => $team])
                    </div>
                    </div>
                </div>                            

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
