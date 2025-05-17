@props(['boards', 'team'])

@if ($boards->count())
    <div
        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4"> {{ $team->name }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($boards as $board)
                <a href="{{ route('boards.show', [$board]) }}">
                    <div class="bg-white dark:bg-gray-700 shadow rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $board->name }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                {{ Str::limit($board->description, 100) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@else
    <div class="mt-10 px-6 lg:px-8 text-center text-gray-600 dark:text-gray-300">
        <p>You have no board yet. <a href="{{ route('boards.create', $board) }}"
                class="text-indigo-600 hover:underline">Create one now.</a></p>
    </div>
@endif
