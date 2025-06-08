<div x-data="{ showCardDetail: @entangle('showCardDetail'), editing: @entangle('editing') }" x-cloak x-on:show-card-detail.window="$wire.loadCard($event.detail.id)"
    x-on:keydown.escape.window="showCardDetail = false" class="relative">

    <template x-if="showCardDetail">
        <div x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
            <div @click.away="showCardDetail = false"
                class="bg-base-100 border border-base-300 rounded-xl shadow-xl p-6 w-full max-w-md space-y-4">

                {{-- Header --}}
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-primary"
                        x-text="editing ? 'Edit Card' : @js($card?->title ?? '')"></h2>
                    <button @click="showCardDetail = false"
                        class="text-base-content hover:text-primary text-xl">&times;</button>
                </div>

                @if ($card)
                    {{-- Edit form --}}
                    <form wire:submit.prevent="updateCard" x-show="editing" x-cloak class="space-y-4">
                        <x-mary-input label="Title" wire:model.defer="title" required />
                        <x-mary-textarea rows="5" label="Description" wire:model.defer="description"
                            placeholder="Card details, notes, etc." />
                        <x-mary-input type="date" label="Due Date" wire:model.defer="due_date" />
                        <div class="flex justify-end space-x-3 pt-2">
                            <x-mary-button type="submit" label="Save" class="btn-success" />
                            <x-mary-button label="Cancel" @click.prevent="editing = false" class="btn-outline" />
                        </div>
                    </form>

                    {{-- View mode --}}
                    <div x-show="!editing" x-cloak class="space-y-2 text-base-content">
                        <p class="text-md leading-relaxed">{{ $card->description ?: 'No description available.' }}</p>
                        @if ($card->due_date)
                            <p class="text-sm text-primary"><strong>Due:</strong> {{ $card->due_date }}</p>
                        @endif
                        <p class="text-xs opacity-70">Created: {{ $card->created_at->format('M d, Y H:i') }}</p>

                        <div class="flex justify-end space-x-3 pt-2">
                            <x-mary-button label="Edit" @click="editing = true" class="btn-success" />
                            <x-mary-button label="Close" @click="showCardDetail = false" class="btn-outline" />
                            <x-mary-button label="Delete" wire:click="deleteCard"
                                wire:confirm="Are you sure you want to delete this card? This action cannot be undone."
                                class="btn-error" />
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </template>
</div>
