@props(['board'])

<div x-data="{ showAddColumn: false }" class="p-6">
    <x-button @click="showAddColumn = true" class="text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded mb-4">
        + New Column
    </x-button>

    <div x-show="showAddColumn" class="fixed inset-0 bg-gray-900/60 z-50 flex items-center justify-center">
        <div @click.away="showAddColumn = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Add New Column</h2>
            <form method="POST" action="{{ route('columns.store') }}">
                @csrf
                <input type="hidden" name="board_id" value="{{ $board->id }}" class="">
                <label for="input_name"
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4">Column
                    Name</label>
                <input type="text" id="input_name" name="name" placeholder="Front Desk"
                    class="w-full px-3 py-2 mb-4 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                    required>
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showAddColumn = false"
                        class="px-4 py-2 rounded bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
