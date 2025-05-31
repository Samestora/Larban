<x-mary-form wire:submit.prevent="updateCard">
    <x-mary-modal wire:model="showCardDetail" :title="$card?->title" class="backdrop-blur" persistent>
        @if ($card)
            @if ($editing)
                <div class="space-y-4">
                    <x-mary-input label="Title" wire:model.defer="title" required />
                    <x-mary-textarea rows="5" label="Description" wire:model.defer="description" />
                    <x-mary-input type="date" label="Due Date" wire:model.defer="due_date" />
                </div>
            @else
                <div>
                    <p class="text-lg my-2">{{ $card->description }}</p>
                    <p class="text-xs mt-1">
                        @if ($card->due_date)
                            Due: {{ $card->due_date }}
                        @endif
                    </p>
                    <p class="text-xs mt-1">Created: {{ $card->created_at->format('M d, Y H:i') }}
                    </p>
                </div>
            @endif
        @endif

        <x-slot:actions class="flex flex-row justify-evenly">
            <x-mary-button label="Delete" wire:click="deleteCard"
                wire:confirm="Are you sure you want to delete this card? This action cannot be undone."
                class="btn btn-error" />
            @if ($editing)
                <x-mary-button label="Cancel" wire:click="$set('editing', false)"
                    wire:click="$set('showCardDetail', false )" class="btn btn-warning" />
                <x-mary-button type="submit" label="Save" class="btn btn-success" />
            @else
                <x-mary-button label="Close" wire:click="$set('showCardDetail', false)" class="btn btn-warning" />
                <x-mary-button label="Edit" wire:click="$set('editing', true)" class="btn btn-success" />
            @endif
        </x-slot:actions>
    </x-mary-modal>
</x-mary-form>
