<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('All of your boards are here') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div
                class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($boards as $board)
                        <a href="{{ route('board.show', [$board]) }}" wire:key="board-{{ $board->id }}">
                            <div
                                class="bg-white dark:bg-gray-700 shadow rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                <div class="p-4">
                                    <h3>Team: {{ $board->team->name }}</h3>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $board->name }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        {{ Str::limit($board->description, 100) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="mt-10 px-6 lg:px-8 text-center text-gray-600 dark:text-gray-300">
                            <p>You have no board yet. <a href="#" class="text-indigo-600 hover:underline">Create
                                    one now.</a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
