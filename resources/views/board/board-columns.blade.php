<div class="flex space-x-4 overflow-auto">
    @foreach ($columns as $column)
        <div class="w-64 bg-gray-100 dark:bg-gray-700 p-4 rounded shadow">
            <h3 class="font-bold text-lg mb-2">{{ $column->name }}</h3>

            @foreach ($column->cards as $card)
                <div class="bg-white dark:bg-gray-800 p-2 rounded shadow mb-2">
                    {{ $card->title }}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
