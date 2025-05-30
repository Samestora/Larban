<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $board->name }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($board->columns->count())
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="flex space-x-6 p-6 min-w-max">
                        @foreach ($board->columns as $column)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded shadow min-w-[18rem] flex-shrink-0">
                                <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-4">
                                    {{ $column->name }}</h3>
                                <div id="column-{{ $column->id }}" class="space-y-2 sortable-column"
                                    data-column="{{ $column->id }}">
                                    @foreach ($column->cards->sortBy('position') as $card)
                                        <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-3 rounded shadow-sm"
                                            x-data @click="$dispatch('card-selected', { id: {{ $card->id }} })"
                                            data-id="{{ $card->id }}">
                                            <div class="font-bold cursor-pointer handle">
                                                {{ $card->title }}
                                            </div>
                                            <div class="text-sm text-gray-700 dark:text-gray-300">
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
        @endif

        <div class="flex justify-center">
            @livewire('board.create-card-form', ['board' => $board])
            @livewire('board.create-column-form', ['board' => $board])
        </div>
    </div>
</div>
