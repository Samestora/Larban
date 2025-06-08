<div class="flex flex-col h-full py-6 px-4 space-y-6 text-sm">

    {{-- Branding --}}
    <a href="{{ route('dashboard') }}"
        class="flex text-2xl text-primary items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150 font-semibold shadow-sm">
        <x-application-mark class="w-8 h-8" />
        {{ config('app.name', 'Larban') }}
    </a>

    {{-- Navigation --}}
    <nav class="space-y-1">
        @php
            $links = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fa-table'],
                ['route' => 'boards.show', 'label' => 'Boards', 'icon' => 'fa-columns'],
                ['route' => 'stats.show', 'label' => 'Stats', 'icon' => 'fa-chart-line'],
            ];
        @endphp

        @foreach ($links as $link)
            <a href="{{ route($link['route']) }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all duration-150 {{ request()->routeIs($link['route']) ? 'bg-primary text-primary-content font-semibold shadow-sm' : 'hover:bg-base-200 hover:text-primary text-base-content' }}">
                <i class="fa-solid {{ $link['icon'] }} w-4"></i>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="border-t border-base-300 pt-4 space-y-4 mt-auto">

        {{-- User Dropdown --}}
        <x-inline-dropdown title="{{ Auth::user()->name }}" icon="fa-user">
            <a href="{{ route('profile.show') }}" class="block px-2 py-1 hover:text-primary">
                {{ __('Profile') }}
            </a>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="block px-2 py-1 hover:text-primary">
                    {{ __('API Tokens') }}
                </a>
            @endif

            <div class="border-t border-base-300 my-1"></div>

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="block w-full text-left px-2 py-1 text-error cursor-pointer">
                    {{ __('Log Out') }}
                </button>
            </form>
        </x-inline-dropdown>

        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <x-inline-dropdown title="{{ Auth::user()->currentTeam->name }}" icon="fa-people-group">
                <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    class="block px-2 py-1 hover:text-primary">
                    {{ __('Team Settings') }}
                </a>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <a href="{{ route('teams.create') }}" class="block px-2 py-1 hover:text-primary">
                        {{ __('Create New Team') }}
                    </a>
                @endcan

                <div class="border-t border-base-300 my-1"></div>

                @foreach (Auth::user()->allTeams() as $team)
                    <div class="px-2 py-1">
                        <x-switchable-team :team="$team" />
                    </div>
                @endforeach
            </x-inline-dropdown>
        @endif
    </div>
</div>
