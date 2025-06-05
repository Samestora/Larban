<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-100 dark:bg-base-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="overflow-x-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6 items-start">
                    @foreach ($board->columns as $column)
                        <div class="bg-base-content text-base-100 border-2 rounded shadow flex flex-col">
                            <!-- Column Title -->
                            <h3 class="bg-primary text-center font-bold text-lg py-4 px-4">
                                {{ $column->name }}
                            </h3>

                            <!-- Column Cards -->
                            <div id="column-{{ $column->id }}"
                                class="sortable-column overflow-y-auto no-scrollbar space-y-2 p-2"
                                data-column="{{ $column->id }}" style="max-height: calc(75vh - 250px);">
                                @foreach ($column->cards->sortBy('position') as $card)
                                    <div class="bg-base-200 dark:bg-base-100 p-3 rounded shadow-sm cursor-pointer handle"
                                        data-id="{{ $card->id }}" x-data
                                        @click="$dispatch('show-card-detail', { id: {{ $card->id }} })">
                                        <div class="text-primary font-bold text-center">
                                            {{ $card->title }}
                                        </div>
                                        <div class="text-sm text-base-content dark:text-base-content opacity-90">
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

        <!-- Create Card Form -->
        <div class="flex justify-center mt-8">
            @livewire('board.create-card-form', ['board' => $board])
        </div>
    </div>
</div>

<!-- SortableJS Integration -->
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
