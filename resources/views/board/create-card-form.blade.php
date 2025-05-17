@props(['board'])

<div x-data="{ showAddCard: false }" class="p-6">
    <x-button @click="showAddCard = true" class="text-sm bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
        + Add Card
    </x-button>

    <div x-show="showAddCard" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div @click.away="showAddCard = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Add Card</h2>

            <form action="{{ route('cards.store') }}" method="POST">
                @csrf
                <label
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4">Select
                    Column</label>
                <select name="column_id" required
                    class="w-full px-3 py-2 mb-4 border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white rounded">
                    @foreach ($board->columns as $column)
                        <option value="{{ $column->id }}">{{ $column->name }}</option>
                    @endforeach
                </select>
                <label
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4"
                    for="input_title">Title</label>
                <input type="text" id="input_title" name="title" placeholder="Meeting"
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4"
                    required>
                <label
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4"
                    for="input_description">Add description here</label>
                <input type="text" id="input_description" name="description" placeholder="Meeting with client"
                    class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white mb-4">

                <div class="flex justify-end gap-2">
                    <button type="button" @click="showAddCard = false"
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded hover:bg-gray-400">
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
