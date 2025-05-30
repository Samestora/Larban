<div x-cloak x-data="{ showAddColumn: false }" x-on:refresh-board.window="showAddColumn = false" class="p-6">
    <x-mary-button @click="showAddColumn = true" class="text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded">
        + New Column
    </x-mary-button>

    <div x-show="showAddColumn" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div @click.away="showAddColumn = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Add New Column</h2>

            <x-mary-form wire:submit="createColumn">
                <x-mary-input label="Column Name" wire:model.defer="name" placeholder="Front Desk" required />

                <x-slot:actions>
                    <x-mary-button label="Cancel" type="button" @click="showAddColumn = false" />
                    <x-mary-button label="Add" type="submit" class="btn-success" spinner="createColumn" />
                </x-slot:actions>
            </x-mary-form>
        </div>
    </div>
</div>
