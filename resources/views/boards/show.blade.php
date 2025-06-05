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
                                class="bg-primary text-base-100 shadow rounded-lg hover:shadow-lg transition-shadow duration-200">
                                <div class="p-4 flex flex-col justify-around text-center space-y-1">
                                    <h3 class="text-2xl font-bold text-base-100">{{ $board->name }}</h3>
                                    <h4 class="text-sm font-semibold text-base-100">Team: {{ $board->team->name }}</h4>
                                    <p class="text-sm text-base-100 opacity-90">
                                        {{ Str::limit($board->description, 100) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="mt-10 px-6 lg:px-8 text-center text-base-content opacity-75">
                            <p>You have no board yet.
                                <a href="#" class="text-primary hover:underline font-semibold">Create one now.</a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
