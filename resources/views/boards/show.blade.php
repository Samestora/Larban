<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

@php
    $groupedBoards = $boards->groupBy('team.name');
@endphp

<div class="space-y-6">
    {{-- Section Title --}}
    <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-primary mb-1">Your Boards</h2>
        <p class="text-base-content">Here’s a quick view of all your current boards grouped by team.</p>
    </div>

    {{-- Boards Grouped by Team --}}
    @forelse ($groupedBoards as $teamName => $teamBoards)
        <div class="p-6 bg-base-200 border border-base-200 rounded-xl shadow space-y-4">
            <h3 class="text-xl font-semibold text-base-content">{{ $teamName }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($teamBoards as $board)
                    <a href="{{ route('board.show', [$board]) }}" wire:key="board-{{ $board->id }}">
                        <div
                            class="bg-base-100 text-base-content rounded-xl shadow-md hover:shadow-xl transition duration-200">
                            <div class="p-5 space-y-2 text-center">
                                <h4 class="text-lg font-bold text-primary">{{ $board->name }}</h4>
                                <p class="text-sm opacity-90">{{ Str::limit($board->description, 100) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center text-base-content opacity-75">
            <p>You have no boards yet.
                <a href="#" class="text-primary hover:underline font-semibold">Create one now.</a>
            </p>
        </div>
    @endforelse
</div>
