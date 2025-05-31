<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-300 dark:bg-base overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-base-100 dark:bg-base-100 border-b border-base-300 dark:border-base-300">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($boards as $board)
                        <a href="{{ route('board.show', [$board]) }}" wire:key="board-{{ $board->id }}">
                            <div
                                class="bg-primary dark:bg-primary shadow rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                <div class="p-4 flex flex-col justify-around text-center">
                                    <h3 class="text-2xl text-base-300 dark:text-base-300 font-bold">
                                        {{ $board->name }}
                                    </h3>
                                    <h3 class="text-sm text-base-300 dark:text-base-300 font-semibold">Team:
                                        {{ $board->team->name }}</h3>
                                    <p class="text-sm text-base-300 dark:text-base-300 mt-1">
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
