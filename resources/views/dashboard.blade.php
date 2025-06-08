<x-app-layout>
    <x-slot name="header">
        <h2 class="text-sm font-bold">Dashboard</h2>
    </x-slot>

    {{-- Content --}}
    <div class="space-y-4">
        <div class="p-8 lg:p-12 bg-base-100 border-b border-base-200 dark:border-base-300 rounded-xl shadow-lg">
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-primary leading-tight">
                    {{ 'Welcome to ' . config('app.name') }}
                </h1>
                <h2 class="mt-4 text-xl md:text-2xl font-medium text-base-content dark:text-base-content">
                    Visual task management made simple
                </h2>
            </div>

            <p class="mt-8 leading-relaxed text-lg text-base-content dark:text-base-content max-w-3xl mx-auto">
                This Kanban board lets you manage your work visually using cards, columns, and drag-and-drop
                functionality.
                Whether you're planning a product launch, managing client tasks, or organizing your daily to-dos, this
                tool
                keeps everything in one place — clear, organized, and actionable.
            </p>
        </div>

        <div
            class="bg-base-200 bg-opacity-75 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 p-8 lg:p-12 rounded-xl shadow-inner">
            {{-- Go To Boards --}}
            <div
                class="flex flex-col justify-between bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                <div class="flex items-center mb-3">
                    <i class="fas fa-th-large text-primary text-xl"></i>
                    <h2 class="ms-3 text-xl font-semibold">
                        <a href="{{ route('boards.show') }}" class="hover:text-primary transition-colors duration-200">
                            View All Boards
                        </a>
                    </h2>
                </div>

                <p class="mt-4 text-base-content dark:text-base-content leading-relaxed">
                    Access and manage all your Kanban boards, organized by their respective teams, for a
                    comprehensive
                    overview
                    of your projects.
                </p>

                <p class="mt-6 text-sm">
                    <a href="{{ route('boards.show') }}"
                        class="inline-flex items-center font-semibold text-primary hover:scale-105 transition-transform duration-200">
                        Go to Boards
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-primary">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
            {{-- Go To Profile --}}
            <div
                class="flex flex-col justify-between  bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                <div class="flex items-center mb-3">
                    <i class="fas fa-user-cog text-primary text-xl"></i>
                    <h2 class="ms-3 text-xl font-semibold">
                        <a href="{{ route('profile.show') }}" class="hover:text-primary transition-colors duration-200">
                            Manage Profile
                        </a>
                    </h2>
                </div>

                <p class="mt-4 text-base-content dark:text-base-content leading-relaxed">
                    Access your profile here on the dashboard panel or you can access it on the sidebar on your left
                    instead
                </p>

                <p class="mt-6 text-sm">
                    <a href="{{ route('profile.show') }}"
                        class="inline-flex items-center font-semibold text-primary hover:scale-105 transition-transform duration-200">
                        Go to Profile
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-primary">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
            {{-- Go To Teams --}}
            <div
                class="flex flex-col justify-between  bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                <div class="flex items-center mb-3">
                    <i class="fas fa-users-cog text-primary text-xl"></i>
                    <h2 class="ms-3 text-xl font-semibold">
                        <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            class="hover:text-primary transition-colors duration-200">
                            Manage Teams
                        </a>
                    </h2>
                </div>

                <p class="mt-4 text-base-content dark:text-base-content leading-relaxed">
                    Manage your teams be it renaming your team name, adding a new member as an editor or administrator
                    here, or making a new team if you wish!
                </p>

                <p class="mt-6 text-sm">
                    <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        class="inline-flex items-center font-semibold text-primary hover:scale-105 transition-transform duration-200">
                        Go to Team
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-primary">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
            {{-- Go To Stats --}}
            <div
                class="flex flex-col justify-between  bg-base-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 border border-base-200 dark:border-base-300">
                <div class="flex items-center mb-3">
                    <i class="fas fa-chart-line text-primary text-xl"></i>
                    <h2 class="ms-3 text-xl font-semibold">
                        <a href="{{ route('stats.show') }}" class="hover:text-primary transition-colors duration-200">
                            Manage Stats
                        </a>
                    </h2>
                </div>

                <p class="mt-4 text-base-content dark:text-base-content leading-relaxed">
                    You can see the statistics that linked to your productivity here!
                </p>

                <p class="mt-6 text-sm">
                    <a href="{{ route('stats.show') }}"
                        class="inline-flex items-center font-semibold text-primary hover:scale-105 transition-transform duration-200">
                        Go to Stats
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 size-5 fill-primary">
                            <path fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
