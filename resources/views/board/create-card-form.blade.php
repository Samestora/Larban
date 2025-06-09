<div x-cloak x-data="{ showAddCard: false }" x-on:refresh-board.window="showAddCard = false"
    x-on:keydown.escape.window="showAddCard = false" class="p-6">

    {{-- Trigger Button --}}
    <x-mary-button @click="showAddCard = true"
        class="text-base-100 bg-primary hover:bg-primary/70 px-4 py-2 rounded shadow">
        + Add Card
    </x-mary-button>

    {{-- Modal --}}
    <div x-show="showAddCard" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
        <div @click.away="showAddCard = false"
            class="bg-base-100 border border-base-300 rounded-xl shadow-xl p-6 w-full max-w-md space-y-4">

            {{-- Modal Header --}}
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-primary">Add Card</h2>
                <button @click="showAddCard = false"
                    class="text-base-content hover:text-primary text-xl">&times;</button>
            </div>

            {{-- Card Form --}}
            <x-mary-form wire:submit="createCard" class="space-y-4">
                <x-mary-select label="Select Column" icon="o-bars-3" :options="$board->columns" wire:model="column_id"
                    name="column_id" required />

                <x-mary-input label="Title" wire:model.defer="title" placeholder="e.g. Meeting" name="title"
                    required />
                <x-mary-input label="Description" wire:model.defer="description" placeholder="e.g. Meeting with client"
                    name="description" />
                <x-mary-input type="date" label="Due Date" wire:model.defer="due_date" placeholder="20 May 2069"
                    name="due_date" />

                <x-mary-choices label="Assign Users" wire:model="assignees" :options="$assignableUsers" option-avatar="avatar_url"
                    multiple clearable hint="You can select more than one user" />

                {{-- Form Actions --}}
                <div class="flex justify-end space-x-3 pt-2">
                    <x-mary-button label="Cancel" @click="showAddCard = false" class="btn-outline" />
                    <x-mary-button type="submit" label="Add" class="btn-success" spinner="createCard" />
                </div>
            </x-mary-form>
        </div>
    </div>
</div>
