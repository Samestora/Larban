<x-mary-modal wire:model="show" :title="$card?->title ?? 'Card Details'" class="backdrop-blur">
    @if ($card)
        @if (!$editing)
            <div>
                <p class="text-gray-700 dark:text-gray-300">{{ $card->description }}</p>
                <p class="text-sm text-gray-500 mt-2">
                    @if ($card->due_date)
                        Due: {{ \Carbon\Carbon::parse($card->due_date)->format('F j, Y') }}
                    @endif
                </p>
            </div>
        @else
            <div class="space-y-4">
                <x-mary-input label="Title" wire:model.defer="card.title" />
                <x-mary-textarea label="Description" wire:model.defer="card.description" />
                <x-mary-input type="date" label="Due Date" wire:model.defer="card.due_date" />
            </div>
        @endif
    @endif

    <x-slot:actions>
        @if ($editing)
            <x-mary-button label="Save" wire:click="updateCard" color="success" />
            <x-mary-button label="Cancel" wire:click="$set('editing', false)" />
        @else
            <x-mary-button label="Edit" wire:click="$set('editing', true)" />
        @endif
        <x-mary-button label="Close" wire:click="$set('show', false)" color="secondary" />
    </x-slot:actions>
</x-mary-modal>
