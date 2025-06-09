<div x-cloak x-data="{ showAddBoard: false, preview: null }" x-on:refresh-board.window="showAddBoard = false; preview = null"
    x-on:keydown.escape.window="showAddBoard = false; preview = null" class="p-6">

    {{-- Trigger Button --}}
    <x-mary-button @click="showAddBoard = true"
        class="text-base-100 bg-primary hover:bg-primary/70 px-4 py-2 rounded shadow">
        + Add Board
    </x-mary-button>

    {{-- Modal --}}
    <div x-show="showAddBoard" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
        <div @click.away="showAddBoard = false; preview = null"
            class="bg-base-100 border border-base-300 rounded-xl shadow-xl p-6 w-full max-w-md space-y-4">

            {{-- Header --}}
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-primary">Add Board</h2>
                <button @click="showAddBoard = false; preview = null"
                    class="text-base-content hover:text-primary text-xl">
                    &times;
                </button>
            </div>

            {{-- Board Form --}}
            <x-mary-form wire:submit.prevent="createBoards" class="space-y-4">
                <x-mary-input label="Board Name" wire:model.defer="name" placeholder="e.g. Project Alpha" required />
                <x-mary-input label="Description" wire:model.defer="description" placeholder="Short summary..." />
                <x-mary-select label="Select Team" icon="o-bars-3" :options="Auth::user()->allTeams()" wire:model="team_id" name="team_id"
                    required />
                <div class="space-y-2">
                    <x-mary-file wire:model="thumbnail_path" label="Thumbnail" hint="Only Image, Max 2MB"
                        accept="image/*"
                        x-on:change="
                            const file = $event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => preview = e.target.result;
                                reader.readAsDataURL(file);
                            }
                        " />

                    <template x-if="preview">
                        <img :src="preview" alt="Preview" class="rounded-xl w-full h-32 object-cover shadow" />
                    </template>

                    @error('thumbnail_path')
                        <p class="text-sm text-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Form Actions --}}
                <div class="flex justify-end space-x-3 pt-2">
                    <x-mary-button type="submit" label="Add" class="btn-success" spinner="createBoards" />
                </div>
            </x-mary-form>
        </div>
    </div>
</div>
