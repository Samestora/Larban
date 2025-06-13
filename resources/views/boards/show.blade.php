<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

@php
    $groupedBoards = $boards->groupBy('team.name');
@endphp

<div class="space-y-6">
    {{-- Page Title --}}
    <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-primary mb-1">Your Boards</h2>
        <p class="text-base-content">Here’s a quick view of all your current boards grouped by team.</p>
        {{-- Add Board Trigger --}}
        <div class="flex justify-center">
            @livewire('create-boards-form')
        </div>
    </div>


    {{-- Boards Grouped by Team --}}
    @forelse ($groupedBoards as $teamName => $teamBoards)
        <div class="p-6 bg-base-200 border border-base-200 rounded-xl shadow space-y-4">
            <h3 class="text-xl font-semibold text-base-content">{{ $teamName }}</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($teamBoards as $board)
                    <div x-data="{ showEdit: false }" class="relative" wire:key="board-{{ $board->id }}">
                        {{-- Board Card --}}
                        <a wire:navigate.hover href="{{ route('board.show', [$board]) }}"
                            class="block bg-base-100 rounded-xl shadow-md hover:shadow-xl transition duration-200 p-5 group">
                            @if ($board->thumbnail_path)
                                <img src="{{ asset('storage/' . $board->thumbnail_path) }}" alt="Board Thumbnail"
                                    class="rounded-lg w-full h-32 object-cover mb-3">
                            @endif
                            <div class="text-center space-y-2">
                                <h4 class="text-lg font-bold text-primary group-hover:underline">
                                    {{ $board->name }}
                                </h4>
                                <p class="text-sm text-base-content/80">{{ Str::limit($board->description, 100) }}</p>
                            </div>
                        </a>

                        {{-- Edit Button --}}
                        <button @click="showEdit = true"
                            class="absolute top-2 right-2 bg-base-100 hover:bg-base-300 border border-base-300 text-base-content px-2 py-1 rounded-full shadow-sm">
                            <i class="fas fa-pen text-xs"></i>
                        </button>

                        {{-- Edit Modal --}}
                        <div x-show="showEdit" x-cloak x-transition
                            class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
                            <div @click.away="showEdit = false"
                                class="bg-base-100 border border-base-300 rounded-xl shadow-xl p-6 w-full max-w-md space-y-4">

                                {{-- Modal Header --}}
                                <div class="flex justify-between items-center">
                                    <h2 class="text-xl font-semibold text-primary">Edit Board</h2>
                                    <button @click="showEdit = false"
                                        class="text-xl text-base-content hover:text-primary">&times;</button>
                                </div>

                                {{-- Livewire Form --}}
                                @livewire('edit-board-form', ['boardId' => $board->id], key('edit-board-' . $board->id))
                            </div>
                        </div>
                    </div>
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
