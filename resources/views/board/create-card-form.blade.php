<div x-cloak x-data="{ showAddCard: false }" x-on:refresh-board.window="showAddCard = false" class="p-6">
    <x-mary-button @click="showAddCard = true"
        class="text-base-300 bg-primary hover:bg-primary/50 hover:text-base-300 px-4 py-2 rounded">
        + Add Card
    </x-mary-button>

    <div x-show="showAddCard" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div @click.away="showAddCard = false" class="bg-base-100 background-blur rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold dark:text-base mb-4">Add Card</h2>

            <x-mary-form wire:submit="createCard">
                <x-mary-select label="Select Column" icon="o-bars-3" :options="$board->columns" wire:model="column_id"
                    name="column_id" required />

                <x-mary-input label="Title" wire:model.defer="title" placeholder="Meeting" name="title" required />

                <x-mary-input label="Description" wire:model.defer="description" placeholder="Meeting with client"
                    name="description" />

                <x-slot:actions>
                    <x-mary-button label="Cancel" @click="showAddCard = false" />
                    <x-mary-button type="submit" label="Add" class="btn-success" spinner="createCard" />
                </x-slot:actions>
            </x-mary-form>
        </div>
    </div>
</div>
