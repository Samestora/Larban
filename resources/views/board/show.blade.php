<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $board->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- New --}}
            @livewire('board.board-view', ['board' => $board])

            <div class="flex justify-center">
                @livewire('board.create-card-form', ['board' => $board])
                @livewire('board.create-column-form', ['board' => $board])
            </div>
        </div>
    </div>
</x-app-layout>
