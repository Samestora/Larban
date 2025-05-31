<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-100 dark:bg-base overflow-hidden shadow-xl sm:rounded-lg">
            <div class="overflow-x-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6 items-start"> {{-- Added items-start here --}}
                    @foreach ($board->columns as $column)
                        <div class="bg-primary dark:bg-primary pb-4 px-4 rounded shadow flex-shrink-0 flex flex-col"
                            style="max-height: calc(75vh - 150px); overflow-y: auto;"> {{-- Key changes here --}}
                            <h3
                                class="bg-primary text-center font-bold text-lg text-base-300 dark:text-base-300 mb-4 sticky top-0 z-10 py-4 px-4 -mx-4">
                                {{ $column->name }}
                            </h3>

                            {{-- The card container itself doesn't need flex-grow or fixed height anymore, but still needs sortable class --}}
                            <div id="column-{{ $column->id }}" class="space-y-2 sortable-column"
                                data-column="{{ $column->id }}">
                                @foreach ($column->cards->sortBy('position') as $card)
                                    <div class="bg-base-200 dark:bg-base-100 p-3 rounded shadow-sm" x-data
                                        @click="$dispatch('show-card-detail', { id: {{ $card->id }} })"
                                        data-id="{{ $card->id }}">
                                        <div class="text-center text-primary font-bold cursor-pointer handle">
                                            {{ $card->title }}
                                        </div>
                                        <div class="text-sm">
                                            {{ \Illuminate\Support\Str::limit($card->description, 50) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @livewire('board.show-card')
        </div>

        {{-- Sortable JS --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.sortable-column').forEach(function(el) {
                    new Sortable(el, {
                        group: 'cards',
                        animation: 150,
                        handle: '.handle',
                        onEnd: function(evt) {
                            const columnId = evt.to.dataset.column;
                            const cardIds = Array.from(evt.to.children).map(card => card.dataset
                                .id);

                            fetch("{{ route('card.sort') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    column_id: columnId,
                                    card_ids: cardIds
                                })
                            });
                        }
                    });
                });
            });
        </script>

        <div class="flex justify-center">
            @livewire('board.create-card-form', ['board' => $board])
        </div>
    </div>
</div>
