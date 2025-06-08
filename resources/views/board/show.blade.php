<x-slot name="header">
    <x-mary-breadcrumbs :items="$breadcrumbs" link-item-class="text-sm font-bold" />
</x-slot>

<div class="space-y-6">
    {{-- Kanban Columns --}}
    <div class="p-6 bg-base-100 border border-base-300 rounded-xl shadow">
        <div class="overflow-x-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-start">
                @foreach ($board->columns as $column)
                    <div class="bg-base-200 border border-base-300 rounded-xl shadow-md flex flex-col">
                        {{-- Column Title --}}
                        <h3 class="bg-primary text-base-100 font-bold text-center py-3 px-4 rounded-t-xl text-lg">
                            {{ $column->name }}
                        </h3>

                        {{-- Cards --}}
                        <div id="column-{{ $column->id }}"
                            class="sortable-column overflow-y-auto no-scrollbar space-y-3 p-4"
                            data-column="{{ $column->id }}"
                            style="max-height: calc(75vh - 250px); min-height: 100px;">
                            @forelse ($column->cards->sortBy('position') as $card)
                                <div class="bg-base-100 border border-base-300 p-3 rounded-lg shadow-sm cursor-pointer handle hover:shadow-md transition"
                                    data-id="{{ $card->id }}" x-data
                                    @click="$dispatch('show-card-detail', { id: {{ $card->id }} })">
                                    <div class="text-primary font-bold text-center">
                                        {{ $card->title }}
                                    </div>
                                    <div class="text-sm text-base-content opacity-90 text-center mt-1">
                                        {{ \Illuminate\Support\Str::limit($card->description, 50) }}
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-sm text-base-content opacity-70">No cards yet.</div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Show Card Modal --}}
    @livewire('board.show-card')

    {{-- Create Card Form --}}
    <div class="p-6 flex justify-center">
        @livewire('board.create-card-form', ['board' => $board])
    </div>
</div>

{{-- SortableJS Integration --}}
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
